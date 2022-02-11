<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035427 extends AbstratCoreMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE539161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE5D8F8B0AD FOREIGN KEY (id_centro_costo_acreedor_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE5FA3DF5CD FOREIGN KEY (id_orden_trabajo_acreedor_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE5F0821C98 FOREIGN KEY (id_elemento_gasto_acreedor_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE56EA527F2 FOREIGN KEY (id_expediente_acreedor_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE municipios ADD CONSTRAINT FK_BBFAB5864E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE nomina_pago ADD CONSTRAINT FK_5CB8BD338D392AC7 FOREIGN KEY (id_empleado_id) REFERENCES empleado (id)');
        $this->addSql('ALTER TABLE nomina_pago ADD CONSTRAINT FK_5CB8BD33AC6A6301 FOREIGN KEY (id_usuario_aprueba_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE nomina_pago ADD CONSTRAINT FK_5CB8BD331D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE nomina_tercero_comprobante ADD CONSTRAINT FK_D4A77ABF2547677 FOREIGN KEY (id_nomina_id) REFERENCES nomina_pago (id)');
        $this->addSql('ALTER TABLE nomina_tercero_comprobante ADD CONSTRAINT FK_D4A77ABF1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE nomina_tercero_comprobante ADD CONSTRAINT FK_D4A77ABF1800963C FOREIGN KEY (id_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE nominas_consecutivos ADD CONSTRAINT FK_9FC8A71A1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE obligacion_cobro ADD CONSTRAINT FK_807C726D55C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE obligacion_pago ADD CONSTRAINT FK_403C9B3BE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE obligacion_pago ADD CONSTRAINT FK_403C9B3B6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE obligacion_pago ADD CONSTRAINT FK_403C9B3B1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E1ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E2D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17EC59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E71381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17EF66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17EF5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17EE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17EECB9FBA7 FOREIGN KEY (id_registro_comprobantes_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E39161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD CONSTRAINT FK_E7EA17E47B60D7E FOREIGN KEY (id_instrumento_cobro_id) REFERENCES instrumento_cobro (id)');
        $this->addSql('ALTER TABLE orden_paquete ADD CONSTRAINT FK_AEE672BBD2000A0 FOREIGN KEY (id_beneficiarios_clientes_id) REFERENCES beneficiarios_clientes (id)');
        $this->addSql('ALTER TABLE orden_trabajo ADD CONSTRAINT FK_4158A0241D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE orden_trabajo ADD CONSTRAINT FK_4158A02439161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE pagos_venta ADD CONSTRAINT FK_F3D4BBF7952BE730 FOREIGN KEY (empleado_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pagos_venta ADD CONSTRAINT FK_F3D4BBF7F04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE pagos_venta ADD CONSTRAINT FK_F3D4BBF7B77634D2 FOREIGN KEY (moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE pagos_venta ADD CONSTRAINT FK_F3D4BBF7CC04A73E FOREIGN KEY (banco_id) REFERENCES banco (id)');
        $this->addSql('ALTER TABLE pagos_venta ADD CONSTRAINT FK_F3D4BBF79AEFF118 FOREIGN KEY (cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE paquete ADD CONSTRAINT FK_12686A955C3A3849 FOREIGN KEY (id_destinatario_id) REFERENCES destinatario_paquete (id)');
        $this->addSql('ALTER TABLE periodo_sistema ADD CONSTRAINT FK_AEF0BAAD1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE periodo_sistema ADD CONSTRAINT FK_AEF0BAAD39161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE periodo_sistema ADD CONSTRAINT FK_AEF0BAAD7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion ADD CONSTRAINT FK_4A1D3ED28E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615E2C70A62 FOREIGN KEY (id_amlacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615E16A5625 FOREIGN KEY (id_unidad_medida_id) REFERENCES unidad_medida (id)');
        $this->addSql('ALTER TABLE producto_categoria_producto ADD CONSTRAINT FK_956AB0777645698E FOREIGN KEY (producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE producto_categoria_producto ADD CONSTRAINT FK_956AB07769022511 FOREIGN KEY (categoria_producto_id) REFERENCES categoria_producto (id)');
        $this->addSql('ALTER TABLE producto_impuesto ADD CONSTRAINT FK_9E754B747645698E FOREIGN KEY (producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE producto_impuesto ADD CONSTRAINT FK_9E754B74D23B6BE5 FOREIGN KEY (impuesto_id) REFERENCES impuesto (id)');
        $this->addSql('ALTER TABLE proveedor ADD CONSTRAINT FK_16C068CEC604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE proveedor_unidad ADD CONSTRAINT FK_EE37BED5CB305D73 FOREIGN KEY (proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE proveedor_unidad ADD CONSTRAINT FK_EE37BED59D01464C FOREIGN KEY (unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91E71CAA3E7 FOREIGN KEY (servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91E2FF8143C FOREIGN KEY (proveedor_unidad_id) REFERENCES proveedor_unidad (id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91E32C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        $this->addSql('ALTER TABLE provincias ADD CONSTRAINT FK_9F631427C604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        
    }
}
