<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202206171002Fixture extends AbstratFixture
{

    public function up(): void
    {
        // Proveedor solyag pro defecto
        $this->addSql("INSERT INTO proveedor (id_moneda_id, nombre, codigo, activo, email) VALUES (2, 'SOLYAG GROUP', '000', 1, 'info@solyag.com');");

        // proveedor_unidad
        $this->addSql("INSERT INTO proveedor_unidad (proveedor_id, unidad_id) VALUE ((SELECT id FROM proveedor WHERE nombre='SOLYAG GROUP' AND codigo='000' LIMIT 1), 1);");
    }
}
