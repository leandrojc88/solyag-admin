<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035425 extends AbstratCoreMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F671D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F6739161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F67C59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F67F66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F675074DD86 FOREIGN KEY (id_orden_tabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE distribuidor ADD CONSTRAINT FK_1AE277DFC604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE distribuidor ADD CONSTRAINT FK_1AE277DFB77634D2 FOREIGN KEY (moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE distribuidor_provincias ADD CONSTRAINT FK_8DA1E24DCEEEDB42 FOREIGN KEY (distribuidor_id) REFERENCES distribuidor (id)');
        $this->addSql('ALTER TABLE distribuidor_provincias ADD CONSTRAINT FK_8DA1E24DA156727D FOREIGN KEY (provincias_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE distribuidor_saldo ADD CONSTRAINT FK_29FECCE6CEEEDB42 FOREIGN KEY (distribuidor_id) REFERENCES distribuidor (id)');
        $this->addSql('ALTER TABLE distribuidor_saldo ADD CONSTRAINT FK_29FECCE6B77634D2 FOREIGN KEY (moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE distribuidor_zona ADD CONSTRAINT FK_1DA5FABD104EA8FC FOREIGN KEY (zona_id) REFERENCES zona_remesas (id)');
        $this->addSql('ALTER TABLE distribuidor_zona ADD CONSTRAINT FK_1DA5FABDCEEEDB42 FOREIGN KEY (distribuidor_id) REFERENCES distribuidor (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC739161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC71D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC77A4F962 FOREIGN KEY (id_tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC74832F387 FOREIGN KEY (id_documento_cancelado_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE elementos_visa ADD CONSTRAINT FK_90B65E04E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE elementos_visa ADD CONSTRAINT FK_90B65E0469D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE elementos_visa ADD CONSTRAINT FK_90B65E041D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE empleado ADD CONSTRAINT FK_D9D9BF521D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE empleado ADD CONSTRAINT FK_D9D9BF52D1E12F15 FOREIGN KEY (id_cargo_id) REFERENCES cargo (id)');
        $this->addSql('ALTER TABLE empleado ADD CONSTRAINT FK_D9D9BF527EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expediente ADD CONSTRAINT FK_D59CA4131D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE facilidades ADD CONSTRAINT FK_551461581D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE facilidades_hotel ADD CONSTRAINT FK_78E84AB16298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE facilidades_hotel ADD CONSTRAINT FK_78E84AB15FB489F0 FOREIGN KEY (id_facilidades_id) REFERENCES facilidades (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA00968BCB606 FOREIGN KEY (id_contrato_id) REFERENCES contratos_cliente (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0091D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0097EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009C59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA00971381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009F66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009F5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA0094F4C4E26 FOREIGN KEY (id_categoria_cliente_id) REFERENCES categoria_cliente (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009C37A5552 FOREIGN KEY (id_termino_pago_id) REFERENCES termino_pago (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA00999274826 FOREIGN KEY (id_factura_cancela_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE factura_cotizacion ADD CONSTRAINT FK_ADBC38788E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE factura_cotizacion ADD CONSTRAINT FK_ADBC38787EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE factura_cotizacion ADD CONSTRAINT FK_ADBC38781D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE factura_cotizacion ADD CONSTRAINT FK_ADBC38784F4C4E26 FOREIGN KEY (id_categoria_cliente_id) REFERENCES categoria_cliente (id)');
        $this->addSql('ALTER TABLE factura_documento ADD CONSTRAINT FK_CCC060C155C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE factura_documento ADD CONSTRAINT FK_CCC060C16601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE factura_documento ADD CONSTRAINT FK_CCC060C1EC34F77F FOREIGN KEY (id_movimiento_venta_id) REFERENCES movimiento_venta (id)');
        $this->addSql('ALTER TABLE facturas_comprobante ADD CONSTRAINT FK_6FD2F19B55C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE facturas_comprobante ADD CONSTRAINT FK_6FD2F19B1800963C FOREIGN KEY (id_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE facturas_comprobante ADD CONSTRAINT FK_6FD2F19B1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE habitaciones_hotel ADD CONSTRAINT FK_74F394B091F48FAD FOREIGN KEY (id_amenidades_id) REFERENCES amenidades (id)');
        $this->addSql('ALTER TABLE habitaciones_hotel ADD CONSTRAINT FK_74F394B06298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE impuesto ADD CONSTRAINT FK_B6E63AA11D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE impuesto_sobre_renta ADD CONSTRAINT FK_5EF11EF48D392AC7 FOREIGN KEY (id_empleado_id) REFERENCES empleado (id)');
        $this->addSql('ALTER TABLE impuesto_sobre_renta ADD CONSTRAINT FK_5EF11EF4E9DBC8E8 FOREIGN KEY (id_nomina_pago_id) REFERENCES nomina_pago (id)');
    }
}
