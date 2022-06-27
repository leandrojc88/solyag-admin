<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202206262035Fixture extends AbstratFixture
{

    public function up(): void
    {

        // Subcuenta
        $this->addSql("UPDATE subcuenta SET nro_subcuenta='0000', descripcion='Subcuenta de tránsito' WHERE id=415;");

    }
}
