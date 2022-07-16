<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Entity\Telecomunicaciones\Servicios;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Servicios\GetCostoServicioSolyag;
use Doctrine\ORM\EntityManagerInterface;

class ListServiciosSolyag
{
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;
    private FormatRecargaCubacelToFacturaData $FormatRecargaCubacelToFacturaData;
    private FormatLargaDistanciaToFacturaData $FormatLargaDistanciaToFacturaData;
    // private GetCostoServicioSolyag $GetCostoServicioSolyag;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository,
        FormatRecargaCubacelToFacturaData $FormatRecargaCubacelToFacturaData,
        FormatLargaDistanciaToFacturaData $FormatLargaDistanciaToFacturaData
        // GetCostoServicioSolyag $GetCostoServicioSolyag
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->empresaLargaDistanciaRegisterRepository = $empresaLargaDistanciaRegisterRepository;
        $this->FormatRecargaCubacelToFacturaData = $FormatRecargaCubacelToFacturaData;
        $this->FormatLargaDistanciaToFacturaData = $FormatLargaDistanciaToFacturaData;
        // $this->GetCostoServicioSolyag = $GetCostoServicioSolyag;
    }
    public function __invoke(
        $empresa,
        $periodo_inicio,
        $periodo_fin
    ) {

        $serviciosSolyag = [];
        $total = 0;

        $recargasCubacel = $this->servicioEmpresaRepository->getListInPeriodByEmpresa(
            $empresa,
            $periodo_inicio,
            $periodo_fin
        );

        if ($recargasCubacel) {
            $return = ($this->FormatRecargaCubacelToFacturaData)($recargasCubacel);
            array_push($serviciosSolyag, ...$return[0]);
            $total = $return[1];
        }

        // larga distancia
        $largaDistancia = $this->empresaLargaDistanciaRegisterRepository->getListInPeriodByEmpresa(
            $empresa,
            $periodo_inicio,
            $periodo_fin
        );

        if ($largaDistancia) {
            $return = ($this->FormatLargaDistanciaToFacturaData)($largaDistancia);
            $serviciosSolyag[] = $return[0];
            $total += $return[1];
        }

        return ["serviciosSolyag" => $serviciosSolyag, "total" => $total];
    }
}
