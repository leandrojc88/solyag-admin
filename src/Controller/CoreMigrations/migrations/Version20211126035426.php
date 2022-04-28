<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035426 extends AbstratCoreMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE impuesto_sobre_renta ADD CONSTRAINT FK_5EF11EF4A9ECE748 FOREIGN KEY (id_rango_escala_id) REFERENCES rango_escala_dgii (id)');
        $this->addSql('ALTER TABLE impuestos_servicio_cotizacion ADD CONSTRAINT FK_2CA4AD5E8E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE impuestos_servicio_cotizacion ADD CONSTRAINT FK_2CA4AD5E69D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE impuestos_servicio_cotizacion ADD CONSTRAINT FK_2CA4AD5ECA29A612 FOREIGN KEY (id_impuesto_id) REFERENCES impuesto (id)');
        $this->addSql('ALTER TABLE informe_recepcion ADD CONSTRAINT FK_62A4EBD6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE informe_recepcion ADD CONSTRAINT FK_62A4EBDE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE localidades ADD CONSTRAINT FK_7A9712DA956589FB FOREIGN KEY (id_minucipio_id) REFERENCES municipios (id)');
        $this->addSql('ALTER TABLE lugares ADD CONSTRAINT FK_A4EE5DFC104EA8FC FOREIGN KEY (zona_id) REFERENCES zona (id)');
        $this->addSql('ALTER TABLE mercancia ADD CONSTRAINT FK_9D094AE0E2C70A62 FOREIGN KEY (id_amlacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE mercancia ADD CONSTRAINT FK_9D094AE0E16A5625 FOREIGN KEY (id_unidad_medida_id) REFERENCES unidad_medida (id)');
        $this->addSql('ALTER TABLE mercancia_categoria_producto ADD CONSTRAINT FK_BDA242A6BCE90A26 FOREIGN KEY (mercancia_id) REFERENCES mercancia (id)');
        $this->addSql('ALTER TABLE mercancia_categoria_producto ADD CONSTRAINT FK_BDA242A669022511 FOREIGN KEY (categoria_producto_id) REFERENCES categoria_producto (id)');
        $this->addSql('ALTER TABLE mercancia_impuesto ADD CONSTRAINT FK_2E2D6041BCE90A26 FOREIGN KEY (mercancia_id) REFERENCES mercancia (id)');
        $this->addSql('ALTER TABLE mercancia_impuesto ADD CONSTRAINT FK_2E2D6041D23B6BE5 FOREIGN KEY (impuesto_id) REFERENCES impuesto (id)');
        $this->addSql('ALTER TABLE mercancia_producto ADD CONSTRAINT FK_3F705CF59F287F54 FOREIGN KEY (id_mercancia_id) REFERENCES mercancia (id)');
        $this->addSql('ALTER TABLE mercancia_producto ADD CONSTRAINT FK_3F705CF56E57A479 FOREIGN KEY (id_producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107AD1CE493D FOREIGN KEY (id_tipo_documento_activo_fijo_id) REFERENCES tipo_documento_activo_fijo (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107ADB763453 FOREIGN KEY (id_tipo_movimiento_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107A873C7FC7 FOREIGN KEY (id_unidad_origen_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107A4F781EA FOREIGN KEY (id_unidad_destino_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA5832E72E FOREIGN KEY (id_activo_fijo_id) REFERENCES activo_fijo (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DADB763453 FOREIGN KEY (id_tipo_movimiento_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA1ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA2D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA4B1CE99D FOREIGN KEY (id_unidad_destino_origen_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DAE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE movimiento_activo_fijo ADD CONSTRAINT FK_A985A0DA571159DE FOREIGN KEY (id_movimiento_cancelado_id) REFERENCES movimiento_activo_fijo (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD79F287F54 FOREIGN KEY (id_mercancia_id) REFERENCES mercancia (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD76601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD77A4F962 FOREIGN KEY (id_tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD77EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD7C59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD7F66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD739161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD7F5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD771381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD755C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE movimiento_mercancia ADD CONSTRAINT FK_44876BD7571159DE FOREIGN KEY (id_movimiento_cancelado_id) REFERENCES movimiento_mercancia (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC6E57A479 FOREIGN KEY (id_producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC7A4F962 FOREIGN KEY (id_tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFCC59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFCF66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC39161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC71381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFCF5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC55C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE movimiento_producto ADD CONSTRAINT FK_FFC0EDFC571159DE FOREIGN KEY (id_movimiento_cancelado_id) REFERENCES movimiento_producto (id)');
        $this->addSql('ALTER TABLE movimiento_servicio ADD CONSTRAINT FK_93FD19C355C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE movimiento_servicio ADD CONSTRAINT FK_93FD19C371CAA3E7 FOREIGN KEY (servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE movimiento_venta ADD CONSTRAINT FK_8E3F7AE555C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        
    }
}
