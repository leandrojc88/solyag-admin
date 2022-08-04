<?php

namespace App\Service\Remesas\Moneda\Exceptions;

use Exception;

class MonedaPaisExistExceptions extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct("La moneda $name ya existe para el pais y la empresa seleccionada");
    }
}
