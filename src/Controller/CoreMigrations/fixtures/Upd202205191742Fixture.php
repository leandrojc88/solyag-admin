<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class Upd202205191742Fixture extends AbstratFixture
{

    public function up(): void
    {
        // Cuenta
        $this->addSql("INSERT INTO cuenta (id, id_tipo_cuenta_id, nro_cuenta, nombre, deudora, mixta, obligacion_deudora, obligacion_acreedora, activo, produccion) VALUES(149, 1, 186, 'Mercancías en consignación', 1, 0, 0, 0, 1, 0);");
        $this->addSql("INSERT INTO cuenta (id, id_tipo_cuenta_id, nro_cuenta, nombre, deudora, mixta, obligacion_deudora, obligacion_acreedora, activo, produccion) VALUES(150, 1, 686, 'Capital contable en consignación', 0, 0, 0, 0, 1, 0);");

        // Subcuenta
        $this->addSql("INSERT INTO subcuenta (id, id_cuenta_id, nro_subcuenta, elemento_gasto, descripcion, deudora, activo, bloqueado) VALUES(415, 149, '0010', 0, 'Mercancías en consignación', 1, 1, 1);");
        $this->addSql("INSERT INTO subcuenta (id, id_cuenta_id, nro_subcuenta, elemento_gasto, descripcion, deudora, activo, bloqueado) VALUES(416, 150, '0010', 0, 'Capital contable en consignación', 0, 1, 1);");

        // Criterio de Analisis
        $this->addSql("INSERT INTO cuenta_criterio_analisis (id, id_cuenta_id, id_criterio_analisis_id, orden) VALUES(149, 70, 5, 2);");

        $this->addSql("INSERT INTO subcuenta_criterio_analisis (id, id_subcuenta_id, id_criterio_analisis_id) VALUES(180, 415, 1);");
        $this->addSql("INSERT INTO subcuenta_criterio_analisis (id, id_subcuenta_id, id_criterio_analisis_id) VALUES(181, 416, 6);");

        // Tipo de Documento
        $this->addSql("INSERT INTO tipo_documento (id, nombre, activo) VALUES(14, 'INFORME DE RECEPCIÓN DE MERCANCIAS EN CONSIGNACIÓN', 1);");
        $this->addSql("INSERT INTO tipo_documento (id, nombre, activo) VALUES(15, 'DEVOLUCIÓN DE MERCANCIAS EN CONSIGNACIÓN', 1);");
        $this->addSql("INSERT INTO tipo_documento (id, nombre, activo) VALUES(16, 'PÉRDIDA DE MERCANCIAS EN CONSIGNACIÓN', 1);");

    }
}
