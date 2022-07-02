<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202207021324Fixture extends AbstratFixture
{

    public function up(): void
    {

        // cuenta
        $this->addSql("INSERT INTO `cuenta` (`id`, `id_tipo_cuenta_id`, `nro_cuenta`, `nombre`, `deudora`, `mixta`, `obligacion_deudora`, `obligacion_acreedora`, `activo`, `produccion`) VALUES(151, 1, 291, 'Compra de servicios no programados', 1, 0, 0, 0, 1, 0);");

        // subcuenta
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(463, 151, '0000', 0, 'Compra de servicios no programados', 1, 1, NULL);");
        $this->addSql("INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`, `bloqueado`) VALUES(464, 83, '0000', 0, 'Venta de servicios no programados', 0, 1, NULL);");
    }
}
