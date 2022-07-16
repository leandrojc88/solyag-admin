<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Entity\Telecomunicaciones\Factura;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Servicios\GetCostoServicioSolyag;

class CalcImporteFactura
{
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;
    private  GetCostoServicioSolyag $GetCostoServicioSolyag;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository,
        GetCostoServicioSolyag $GetCostoServicioSolyag
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->empresaLargaDistanciaRegisterRepository = $empresaLargaDistanciaRegisterRepository;
        $this->GetCostoServicioSolyag = $GetCostoServicioSolyag;
    }
    public function __invoke(
        Factura $factura
    ) {
        $importe = 0;
        $recargasCubacel = $this->servicioEmpresaRepository->findBy([
            "factura" => $factura
        ]);

        foreach ($recargasCubacel as $key => $recarga) {
            /** @var ServicioEmpresa $recarga */
            $importe += ($this->GetCostoServicioSolyag)($recarga->getEmpresa(), $recarga);
        }

        // larga distancia
        $largaDistancia = $this->empresaLargaDistanciaRegisterRepository->findBy([
            "factura" => $factura
        ]);

        foreach ($largaDistancia as $key => $recarga) {
            /** @var EmpresaLargaDistanciaRegister $recarga */
            $importe += ($this->GetCostoServicioSolyag)($recarga->getEmpresa(), $recarga);
        }

        return $importe;
    }
}
