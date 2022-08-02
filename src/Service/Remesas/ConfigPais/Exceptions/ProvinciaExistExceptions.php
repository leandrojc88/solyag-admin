<?php

namespace App\Service\Remesas\ConfigPais\Exceptions;

use Exception;

class ProvinciaExistExceptions extends Exception
{
    public function __construct(string $name, string $pais)
    {
        parent::__construct("La provincia $name ya existe en $pais");
    }
}
