<?php

namespace App\Service\Remesas\ConfigPais\Exceptions;

use Exception;

class ProvinciaInUseException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct("La provincia $name contiene municipios");
    }
}
