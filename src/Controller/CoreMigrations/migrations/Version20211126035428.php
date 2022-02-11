<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035428 extends AbstratCoreMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE puesto_trabajo ADD CONSTRAINT FK_DBFAC77639161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE puesto_trabajo ADD CONSTRAINT FK_DBFAC7761D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE registro_comprobantes ADD CONSTRAINT FK_B2D1B2B21D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE registro_comprobantes ADD CONSTRAINT FK_B2D1B2B2EF5F7851 FOREIGN KEY (id_tipo_comprobante_id) REFERENCES tipo_comprobante (id)');
        $this->addSql('ALTER TABLE registro_comprobantes ADD CONSTRAINT FK_B2D1B2B27EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registro_comprobantes ADD CONSTRAINT FK_B2D1B2B239161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE registro_comprobantes ADD CONSTRAINT FK_B2D1B2B247B60D7E FOREIGN KEY (id_instrumento_cobro_id) REFERENCES instrumento_cobro (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE1ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE2D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AEC59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AEF66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE39161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AEE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AEF5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE71381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC01D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE subcuenta ADD CONSTRAINT FK_57BB37EA1ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE subcuenta_criterio_analisis ADD CONSTRAINT FK_52A4A7682D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE subcuenta_criterio_analisis ADD CONSTRAINT FK_52A4A7685ABBE5F6 FOREIGN KEY (id_criterio_analisis_id) REFERENCES criterio_analisis (id)');
        $this->addSql('ALTER TABLE subcuenta_proveedor ADD CONSTRAINT FK_5C22E4B82D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE subcuenta_proveedor ADD CONSTRAINT FK_5C22E4B8E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE subservicio ADD CONSTRAINT FK_C0164FA369D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE tasa_cambio ADD CONSTRAINT FK_DAB48606FA5CADE9 FOREIGN KEY (id_moneda_origen_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE tasa_cambio ADD CONSTRAINT FK_DAB48606D85CECF7 FOREIGN KEY (id_moneda_destino_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE transferencia ADD CONSTRAINT FK_EDC227306601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE transferencia ADD CONSTRAINT FK_EDC227301D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE transferencia ADD CONSTRAINT FK_EDC2273039161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE turno_trabajo ADD CONSTRAINT FK_CFD6B1EE1ED9E395 FOREIGN KEY (id_puesto_trabajo_id) REFERENCES puesto_trabajo (id)');
        $this->addSql('ALTER TABLE turno_trabajo ADD CONSTRAINT FK_CFD6B1EE7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE turno_trabajo ADD CONSTRAINT FK_CFD6B1EE1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE unidad ADD CONSTRAINT FK_F3E6D02F31E700CD FOREIGN KEY (id_padre_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE unidad ADD CONSTRAINT FK_F3E6D02F374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64937D1669 FOREIGN KEY (id_agencia_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE user_client_tmp ADD CONSTRAINT FK_AC2C28007EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_client_tmp ADD CONSTRAINT FK_AC2C28007BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE vacaciones_disfrutadas ADD CONSTRAINT FK_F02817318D392AC7 FOREIGN KEY (id_empleado_id) REFERENCES empleado (id)');
        $this->addSql('ALTER TABLE vale_salida ADD CONSTRAINT FK_90C265C86601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE zona_remesas ADD CONSTRAINT FK_D37DCA05C604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE zona_remesas ADD CONSTRAINT FK_D37DCA054E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE zona_remesas ADD CONSTRAINT FK_D37DCA0558BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipios (id)');
    }
}
