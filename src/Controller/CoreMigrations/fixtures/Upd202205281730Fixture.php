<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202205281730Fixture extends AbstratFixture
{

    public function up(): void
    {
        // Servicio Paqueteria
        $this->addSql("INSERT INTO servicios (id, nombre, codigo, abreviatura, activo) VALUES(9, 'Envio de paquetes', '0090', 'EP', 1);");

    }
}
