<?php

namespace App\Service\Remesas\ConfigPais\Exceptions;

use Exception;

class PaisInUseException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct("El pais $name contiene provincias");
    }
}
