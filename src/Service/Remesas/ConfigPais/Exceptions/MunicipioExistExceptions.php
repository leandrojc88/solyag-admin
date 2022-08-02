<?php

namespace App\Service\Remesas\ConfigPais\Exceptions;

use Exception;

class MunicipioExistExceptions extends Exception
{
    public function __construct(string $namePais, string $provincia)
    {
        parent::__construct("El municipio $namePais ya existe en $provincia");
    }
}
