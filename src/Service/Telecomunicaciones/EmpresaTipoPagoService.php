<?php

namespace App\Service\Telecomunicaciones;


class EmpresaTipoPagoService
{

    const PREPAGO = 'prepago';
    const POSPAGO = 'pospago';

    public function getTipoForCheckBox($tipo)
    {
        return $tipo ? self::PREPAGO : self::POSPAGO;
    }
}
