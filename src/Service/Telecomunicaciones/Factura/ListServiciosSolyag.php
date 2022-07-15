<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Entity\Telecomunicaciones\Servicios;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use App\Service\Telecomunicaciones\Servicios\GetCostoServicioSolyag;
use Doctrine\ORM\EntityManagerInterface;

class ListServiciosSolyag
{
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;
    private GetCostoServicioSolyag $GetCostoServicioSolyag;

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

        foreach ($recargasCubacel as $key => $recarga) {
            /** @var ServicioEmpresa $recarga */
            $monto = ($this->GetCostoServicioSolyag)($recarga->getEmpresa(), $recarga);
            $isFinded = false;
            $total += number_format($monto, 2);

            foreach ($serviciosSolyag as &$servicioSolyag) {
                if ($servicioSolyag["id_subservicio"] == $recarga->getSubServicio()->getId()) {
                    $servicioSolyag["cantidad"] += 1;
                    $servicioSolyag["total"] = number_format($monto + $servicioSolyag["total"], 2);
                    $isFinded  = true;
                    break;
                }
            }

            if (!$isFinded) {
                $serviciosSolyag[] = [
                    "id_servicio" => Servicios::ID_RECARGA_CUBACEL,
                    "id_subservicio" => $recarga->getSubServicio()->getId(),
                    "descripcion" => Servicios::NAME_RECARGA_CUBACEL . " - " . $recarga->getSubServicio()->getDescripcion(),
                    "cantidad"    => 1,
                    "monto"    => number_format($monto, 2),
                    "total" => number_format($monto, 2)
                ];
                continue;
            }
        }

        // larga distancia
        $largaDistancia = $this->empresaLargaDistanciaRegisterRepository->getListInPeriodByEmpresa(
            $empresa,
            $periodo_inicio,
            $periodo_fin
        );
        $objLargaDistancia = [];

        foreach ($largaDistancia as $key => $recarga) {
            /** @var EmpresaLargaDistanciaRegister $recarga */
            $monto = ($this->GetCostoServicioSolyag)($recarga->getEmpresa(), $recarga);
            $total += number_format($monto, 2);

            if (!$objLargaDistancia) {

                $objLargaDistancia["id_servicio"]    = Servicios::ID_LARGA_DISTANCIA;
                $objLargaDistancia["id_subservicio"] = null;
                $objLargaDistancia["descripcion"]    = Servicios::NAME_LARGA_DISTANCIA;
                $objLargaDistancia["cantidad"]       = 1;
                $objLargaDistancia["monto"]          = '-';
                $objLargaDistancia["total"]          = number_format($monto, 2);
            } else {
                $objLargaDistancia["cantidad"]       = $key + 1;
                $objLargaDistancia["total"]         += number_format($monto, 2);
            }
        }

        if ($objLargaDistancia)
            $serviciosSolyag[] = $objLargaDistancia;

        return ["serviciosSolyag" => $serviciosSolyag, "total" => $total];
    }
}
