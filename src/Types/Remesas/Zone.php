<?php

namespace App\Types\Remesas;

abstract class Zone
{
    const NAME = '';
    public abstract function getId();
    public abstract function getNombre();
    public abstract function getIdParent();
    public function getType()
    {
        return $this::NAME;
    }
}
