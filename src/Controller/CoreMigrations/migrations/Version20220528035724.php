<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528035724 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activo_fijo CHANGE fecha_alta fecha_alta DATETIME NOT NULL');
        $this->addSql('ALTER TABLE apertura_caja_chica CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE asiento CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE avisos_pagos CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bulto CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE cierre CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE cierre_diario CHANGE fecha_cerrado fecha_cerrado DATETIME NOT NULL');
        $this->addSql('ALTER TABLE contratos_cliente CHANGE fecha_aprobado fecha_aprobado DATETIME NOT NULL');
        $this->addSql('ALTER TABLE cuadre_diario CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE depreciacion CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE documento CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE factura_cotizacion CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE facturas_proveedores_servicios CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE impuesto_sobre_renta CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE manifiesto CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE movimiento CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE movimiento_activo_fijo CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE movimiento_mercancia CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE movimiento_producto CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nomina_pago CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE obligacion_cobro CHANGE fecha_factura fecha_factura DATETIME NOT NULL');
        $this->addSql('ALTER TABLE obligacion_pago CHANGE fecha_factura fecha_factura DATETIME NOT NULL');
        $this->addSql('ALTER TABLE orden_paquete CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE paquete CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE periodo_sistema CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE registro_comprobantes CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tasa_cambio CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE traspaso CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE turno_trabajo CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vale_salida CHANGE fecha_solicitud fecha_solicitud DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activo_fijo CHANGE fecha_alta fecha_alta DATE NOT NULL');
        $this->addSql('ALTER TABLE apertura_caja_chica CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE asiento CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE avisos_pagos CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE bulto CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE cierre CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE cierre_diario CHANGE fecha_cerrado fecha_cerrado DATE NOT NULL');
        $this->addSql('ALTER TABLE contratos_cliente CHANGE fecha_aprobado fecha_aprobado DATE NOT NULL');
        $this->addSql('ALTER TABLE cuadre_diario CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE depreciacion CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE documento CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE factura_cotizacion CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE facturas_proveedores_servicios CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE impuesto_sobre_renta CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE manifiesto CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE movimiento CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE movimiento_activo_fijo CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE movimiento_mercancia CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE movimiento_producto CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE nomina_pago CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE obligacion_cobro CHANGE fecha_factura fecha_factura DATE NOT NULL');
        $this->addSql('ALTER TABLE obligacion_pago CHANGE fecha_factura fecha_factura DATE NOT NULL');
        $this->addSql('ALTER TABLE orden_paquete CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE paquete CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE periodo_sistema CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE registro_comprobantes CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE tasa_cambio CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE traspaso CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE turno_trabajo CHANGE fecha fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE vale_salida CHANGE fecha_solicitud fecha_solicitud DATE NOT NULL');
    }
}
