<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202206140951Fixture extends AbstratFixture
{

    public function up(): void
    {
        // Servicio Paqueteria
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(420, 6, '0001', 0, 'Pagos Anticipados a Suministradores', 1, 1, 1);");

        $this->addSql("INSERT INTO subcuenta_criterio_analisis (id, id_subcuenta_id, id_criterio_analisis_id) VALUES(185, 420, 6);");


    }
}
