<?php

namespace App\Service\Remesas\ConfigPais\Exceptions;

use Exception;

class PaisExistExceptions extends Exception
{
    public function __construct(string $namePais)
    {
        parent::__construct("El pais $namePais ya existe");
    }
}
