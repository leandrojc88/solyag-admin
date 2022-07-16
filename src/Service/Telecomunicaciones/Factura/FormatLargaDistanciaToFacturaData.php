<?php

namespace App\Service\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Entity\Telecomunicaciones\Servicios;
use App\Service\Telecomunicaciones\Servicios\GetCostoServicioSolyag;

class FormatLargaDistanciaToFacturaData
{

    private  GetCostoServicioSolyag $GetCostoServicioSolyag;

    public function __construct(
        GetCostoServicioSolyag $GetCostoServicioSolyag
    ) {
        $this->GetCostoServicioSolyag = $GetCostoServicioSolyag;
    }

    public function __invoke($recargas)
    {

        $total = 0;
        $objLargaDistancia = [];

        /** @var EmpresaLargaDistanciaRegister[] $recargas */

        foreach ($recargas as $key => $recarga) {

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

        return [$objLargaDistancia,  $total];
    }
}
