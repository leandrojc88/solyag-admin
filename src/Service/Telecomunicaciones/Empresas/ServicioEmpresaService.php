<?php

namespace App\Service\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class ServicioEmpresaService
{
    private EntityManagerInterface $em;
    private EmpresasRepository $empresasRepository;
    private EmpleadosRepository $empleadosRepository;
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private SubservicioRepository $subservicioRepository;
    private ValidateSaldoEmpresa $validateSaldoEmpresa;
    private EmpresaTipoPagoService $empresaTipoPagoService;
    private EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository;


    public function __construct(
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpleadosRepository $empleadosRepository,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        SubservicioRepository $subservicioRepository,
        ValidateSaldoEmpresa $validateSaldoEmpresa,
        EmpresaTipoPagoService $empresaTipoPagoService,
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository
    ) {
        $this->em = $em;
        $this->empresasRepository = $empresasRepository;
        $this->empleadosRepository = $empleadosRepository;
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->subservicioRepository = $subservicioRepository;
        $this->validateSaldoEmpresa = $validateSaldoEmpresa;
        $this->empresaTipoPagoService = $empresaTipoPagoService;
        $this->empresaSubservicioCubacelRepository = $empresaSubservicioCubacelRepository;
    }


    public function createServicioEmpresa($params)
    {

        $maxNoOrdenFind = $this->servicioEmpresaRepository->getMaxNoOrden($params['id_servicio']);
        $maxNoOrden = intval($maxNoOrdenFind[0]['max_no_orden']);

        $empresa = $this->empresasRepository->find($params['id_empresa']);

        $servicioEmpresa = new ServicioEmpresa();
        $servicioEmpresa
            ->setNoTelefono($params['no_telefono'])
            ->setDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
            ->setEmpresa($empresa)
            ->setEmpleado($this->empleadosRepository->findOneBy(['correo' => $params['email']]))
            ->setServicio($params['id_servicio'])
            // ->setSubServicio($params['sub_servicio'])
            ->setMovimientoVenta($params['movimiento_venta'])
            ->setNoOrden($maxNoOrden + 1);

        // asignar el subservicio o poner un msg de error y declinarlo

        $subservicio = $this->subservicioRepository->find($params['id_api']);

        if ($subservicio) {

            if ($this->validateSaldoEmpresa->validate($empresa, $subservicio)) {

                $servicioEmpresa
                    ->setStatus(Status::INIT)
                    ->setSubServicio($subservicio);

                $empresaSubservicioCubacel = $this->empresaSubservicioCubacelRepository->findOneBy([
                    "id_empresa" => $empresa,
                    "id_subservicio" => $subservicio
                ]);

                if (!$empresaSubservicioCubacel)
                    throw new Exception("El subservicio " . $subservicio->getDescripcion() . " no tiene un costo configurado para la empresa " . $empresa->getNombre());

                $costo = $empresaSubservicioCubacel->getCosto();

                $this->empresaTipoPagoService->reducirSaldo($empresa->getId(), $costo);
            } else
                $servicioEmpresa
                    ->setStatus(Status::DECLINED)
                    ->setSubServicio($subservicio)
                    ->setResponse(
                        ["errors" => [[
                            "code" => null,
                            "message" => "Empresa sin saldo suficiente"
                        ]]]
                    );
        } else {
            $servicioEmpresa
                ->setStatus(Status::DECLINED)
                ->setResponse(
                    ["errors" => [[
                        "code" => null,
                        "message" => "No existe el subservicio o no esta configurado el costo para la empresa (" . $params['sub_servicio'] . ")"
                    ]]]
                );
        }

        $this->em->persist($servicioEmpresa);
        $this->em->flush();

        return ["no_orden" => $servicioEmpresa->noOrdeToStr(), "status" => $servicioEmpresa->getStatus()];
    }

    /**
     * retorna el [servicio, no_orden] de un string con la definicion del numero de orden
     * $noOrdenStr = 1-0001  return [1, 1]
     */
    public function getNoOrdenFromStr($noOrdenStr): array
    {
        $result = explode('-', $noOrdenStr);

        $servicio = intval($result[0]);

        $noOrden = intval($result[1]);

        return [$servicio, $noOrden];
    }

    /**
     * Obtener un {ServicioEmpresa} por un numero de orden determinado
     */
    public function getServicioEmpresaByNoOrden($noOrdenStr): ServicioEmpresa
    {

        $data = $this->getNoOrdenFromStr($noOrdenStr);

        $servicioEmpresa = $this->servicioEmpresaRepository->findOneBy([
            'servicio' => $data[0],
            'no_ordne' => $data[1]
        ]);

        if (!$servicioEmpresa) throw new Exception('No existe el servicio-empresa para el no_orden ' . $noOrdenStr);

        return $servicioEmpresa;
    }

    /**
     * llenando la data para enviar a solyag.online para actualizar el no_orden y
     * status de los movimientos_servicios
     *
     *  [ id_empresa,
     *    servicios = [
     *            [ movimiento_venta, no_orden, status ], ...
     *        ]
     *    ]
     */
    public function prepareDataToSolyagApp($data, ServicioEmpresa $trasaccion)
    {
        foreach ($data as $key => &$item) {

            if ($item['id_empresa'] == $trasaccion->getEmpresa()->getId()) {
                array_push(
                    $item['servicios'],
                    [
                        'movimiento_venta' => $trasaccion->getMovimientoVenta(),
                        'no_orden' => $trasaccion->noOrdeToStr(),
                        'status' => $trasaccion->getStatus(),
                    ]
                );
                return $data;
            }
        }

        $data[] = [
            'id_empresa' => $trasaccion->getEmpresa()->getId(),
            'servicios' => [
                [
                    'movimiento_venta' => $trasaccion->getMovimientoVenta(),
                    'no_orden' => $trasaccion->noOrdeToStr($trasaccion),
                    'status' => $trasaccion->getStatus()
                ]
            ]
        ];

        return $data;
    }
}
