<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Entity\Telecomunicaciones\Factura;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Doctrine\ORM\EntityManagerInterface;

class RegisterFacturarServiciosSolyag
{
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;
    private EntityManagerInterface $em;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository,
        EntityManagerInterface $em
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->empresaLargaDistanciaRegisterRepository = $empresaLargaDistanciaRegisterRepository;
        $this->em = $em;
    }
    public function __invoke(
        $empresa,
        $periodo_inicio,
        $periodo_fin,
        Factura $factura
    ) {
        $recargasCubacel = $this->servicioEmpresaRepository->getListInPeriodByEmpresa(
            $empresa,
            $periodo_inicio,
            $periodo_fin
        );

        foreach ($recargasCubacel as $key => $recarga) {
            /** @var ServicioEmpresa $recarga */

            $recarga->setFactura($factura);
            $this->em->persist($recarga);
        }

        // larga distancia
        $largaDistancia = $this->empresaLargaDistanciaRegisterRepository->getListInPeriodByEmpresa(
            $empresa,
            $periodo_inicio,
            $periodo_fin
        );

        foreach ($largaDistancia as $key => $recarga) {
            /** @var EmpresaLargaDistanciaRegister $recarga */

            $recarga->setFactura($factura);
            $this->em->persist($recarga);
        }

        $this->em->flush();
    }
}
