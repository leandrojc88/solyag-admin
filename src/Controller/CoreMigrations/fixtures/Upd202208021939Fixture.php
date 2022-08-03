<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202208021939Fixture extends AbstratFixture
{

    public function up(): void
    {
        // subcuenta
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(488, 149, '1111', 0, 'Raspaditos', 1, 1, 1);");
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(489, 68, '1111', 0, 'Raspaditos', 1, 1, 1);");
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(490, 75, '1111', 0, 'Raspaditos', 0, 1, 1);");
    }
}
