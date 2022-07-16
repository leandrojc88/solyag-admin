<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Entity\Telecomunicaciones\Servicios;
use App\Service\Telecomunicaciones\Servicios\GetCostoServicioSolyag;

class FormatRecargaCubacelToFacturaData
{

    private  GetCostoServicioSolyag $GetCostoServicioSolyag;

    public function __construct(
        GetCostoServicioSolyag $GetCostoServicioSolyag
    ) {
        $this->GetCostoServicioSolyag = $GetCostoServicioSolyag;
    }

    public function __invoke($recargas)
    {

        $returnFormat = [];
        $total = 0;
        /** @var ServicioEmpresa[] $recargas */

        foreach ($recargas as $key => $recarga) {
            /** @var ServicioEmpresa $recarga */
            $monto = ($this->GetCostoServicioSolyag)($recarga->getEmpresa(), $recarga);
            $isFinded = false;
            $total += number_format($monto, 2);

            foreach ($returnFormat as &$value) {
                if ($value["id_subservicio"] == $recarga->getSubServicio()->getId()) {
                    $value["cantidad"] += 1;
                    $value["total"] = number_format($monto + $value["total"], 2);
                    $isFinded  = true;
                    break;
                }
            }

            if (!$isFinded) {
                $returnFormat[] = [
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

        return [$returnFormat,  $total];
    }
}
