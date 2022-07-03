<?php

namespace App\Service\Telecomunicaciones\LargaDistancia;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use App\Service\Telecomunicaciones\Empresas\ValidateSaldoEmpresa;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;

class CreateEmpresaLargaDistanciaRegister
{
    private EntityManagerInterface $em;
    private EmpresasRepository $empresasRepository;
    private ValidateSaldoEmpresa $validateSaldoEmpresa;
    private EmpleadosRepository $empleadosRepository;
    private EmpresaTipoPagoService $empresaTipoPagoService;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;

    public function __construct(
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        ValidateSaldoEmpresa $validateSaldoEmpresa,
        EmpleadosRepository $empleadosRepository,
        EmpresaTipoPagoService $empresaTipoPagoService,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository
    ) {
        $this->em = $em;
        $this->empresasRepository = $empresasRepository;
        $this->validateSaldoEmpresa = $validateSaldoEmpresa;
        $this->empleadosRepository = $empleadosRepository;
        $this->empresaTipoPagoService = $empresaTipoPagoService;
        $this->empresaLargaDistanciaRegisterRepository = $empresaLargaDistanciaRegisterRepository;
    }
    public function __invoke($params)
    {
        $maxNoOrdenFind = $this->empresaLargaDistanciaRegisterRepository->getMaxNoOrden();
        $maxNoOrden = intval($maxNoOrdenFind[0]['max_no_orden']);

        $empresa = $this->empresasRepository->find($params['id_empresa']);
        $costo = $params['costo'];

        $empresaLargaDistanciaRegister = new EmpresaLargaDistanciaRegister();

        $empresaLargaDistanciaRegister
            ->setNoTelefono($params['no_telefono'])
            ->setDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
            ->setEmpresa($empresa)
            ->setEmpleado($this->empleadosRepository->findOneBy(['correo' => $params['email']]))
            ->setMovimientoVenta($params['movimiento_venta'])
            ->setNoOrden($maxNoOrden + 1)
            ->setIdConfirProveedor($params['no_confirmacion'])
            ->setCosto($costo);

        if ($this->validateSaldoEmpresa->validateVsValue($empresa, $costo)) {
            $empresaLargaDistanciaRegister
                ->setStatus(Status::COMPLETED);

            $this->empresaTipoPagoService->reducirSaldo($empresa->getId(), $costo);
        } else
            $empresaLargaDistanciaRegister
                ->setStatus(Status::DECLINED_SALDO)
                ->setResponse([]);

        $this->em->persist($empresaLargaDistanciaRegister);
        $this->em->flush();

        return [
            "no_orden" => $empresaLargaDistanciaRegister->noOrdeToStr(),
            "status" => $empresaLargaDistanciaRegister->getStatus()
        ];
    }
}
