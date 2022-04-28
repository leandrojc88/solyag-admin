<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204041809 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apertura_caja_chica (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_usuario_empleado_id INT DEFAULT NULL, id_caja_id INT NOT NULL, id_moneda_id INT NOT NULL, fecha DATE NOT NULL, conciliado TINYINT(1) DEFAULT NULL, monto DOUBLE PRECISION NOT NULL, desglose LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', activo TINYINT(1) DEFAULT NULL, INDEX IDX_E3EFE8F67EB2C349 (id_usuario_id), INDEX IDX_E3EFE8F6EBEA8975 (id_usuario_empleado_id), INDEX IDX_E3EFE8F6F31F1F21 (id_caja_id), INDEX IDX_E3EFE8F6374388F5 (id_moneda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facturas_proveedores_servicios (id INT AUTO_INCREMENT NOT NULL, id_proveedor_id INT NOT NULL, nro_factura VARCHAR(255) NOT NULL, importe DOUBLE PRECISION NOT NULL, resto DOUBLE PRECISION DEFAULT NULL, fecha DATE NOT NULL, importe_moneda_unidad DOUBLE PRECISION NOT NULL, resto_moneda_unidad DOUBLE PRECISION DEFAULT NULL, INDEX IDX_C5152139E8F12801 (id_proveedor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gastos_pagar_facturas_proveedor (id INT AUTO_INCREMENT NOT NULL, id_gastos_pagar_id INT NOT NULL, id_facturas_proveedor_id INT NOT NULL, INDEX IDX_F43BE629CDAF5F21 (id_gastos_pagar_id), INDEX IDX_F43BE6297ED66EAC (id_facturas_proveedor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apertura_caja_chica ADD CONSTRAINT FK_E3EFE8F67EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apertura_caja_chica ADD CONSTRAINT FK_E3EFE8F6EBEA8975 FOREIGN KEY (id_usuario_empleado_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apertura_caja_chica ADD CONSTRAINT FK_E3EFE8F6F31F1F21 FOREIGN KEY (id_caja_id) REFERENCES puesto_trabajo (id)');
        $this->addSql('ALTER TABLE apertura_caja_chica ADD CONSTRAINT FK_E3EFE8F6374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE facturas_proveedores_servicios ADD CONSTRAINT FK_C5152139E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE gastos_pagar_facturas_proveedor ADD CONSTRAINT FK_F43BE629CDAF5F21 FOREIGN KEY (id_gastos_pagar_id) REFERENCES gastos_pagar (id)');
        $this->addSql('ALTER TABLE gastos_pagar_facturas_proveedor ADD CONSTRAINT FK_F43BE6297ED66EAC FOREIGN KEY (id_facturas_proveedor_id) REFERENCES facturas_proveedores_servicios (id)');
        $this->addSql('ALTER TABLE asiento ADD id_facturas_proveedores_servicio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C946C863 FOREIGN KEY (id_facturas_proveedores_servicio_id) REFERENCES facturas_proveedores_servicios (id)');
        $this->addSql('CREATE INDEX IDX_71D6D35C946C863 ON asiento (id_facturas_proveedores_servicio_id)');
        $this->addSql('ALTER TABLE cobros_pagos ADD id_facturas_proveedores_servicio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cobros_pagos ADD CONSTRAINT FK_D9581D16946C863 FOREIGN KEY (id_facturas_proveedores_servicio_id) REFERENCES facturas_proveedores_servicios (id)');
        $this->addSql('CREATE INDEX IDX_D9581D16946C863 ON cobros_pagos (id_facturas_proveedores_servicio_id)');
        $this->addSql('ALTER TABLE gastos_pagar ADD resto_facturar DOUBLE PRECISION DEFAULT NULL, ADD importe_moneda_unidad DOUBLE PRECISION DEFAULT NULL, ADD resto_moneda_unidad DOUBLE PRECISION DEFAULT NULL, DROP nro_factura_proveedor, DROP fecha_factura_proveedor');
        $this->addSql('ALTER TABLE movimiento_venta ADD precio_cliente DOUBLE PRECISION DEFAULT NULL, ADD impuesto_cliente DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C946C863');
        $this->addSql('ALTER TABLE cobros_pagos DROP FOREIGN KEY FK_D9581D16946C863');
        $this->addSql('ALTER TABLE gastos_pagar_facturas_proveedor DROP FOREIGN KEY FK_F43BE6297ED66EAC');
        $this->addSql('DROP TABLE apertura_caja_chica');
        $this->addSql('DROP TABLE facturas_proveedores_servicios');
        $this->addSql('DROP TABLE gastos_pagar_facturas_proveedor');
        $this->addSql('DROP INDEX IDX_71D6D35C946C863 ON asiento');
        $this->addSql('ALTER TABLE asiento DROP id_facturas_proveedores_servicio_id');
        $this->addSql('DROP INDEX IDX_D9581D16946C863 ON cobros_pagos');
        $this->addSql('ALTER TABLE cobros_pagos DROP id_facturas_proveedores_servicio_id');
        $this->addSql('ALTER TABLE gastos_pagar ADD nro_factura_proveedor VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD fecha_factura_proveedor DATE DEFAULT NULL, DROP resto_facturar, DROP importe_moneda_unidad, DROP resto_moneda_unidad');
        $this->addSql('ALTER TABLE movimiento_venta DROP precio_cliente, DROP impuesto_cliente');
    }
}
