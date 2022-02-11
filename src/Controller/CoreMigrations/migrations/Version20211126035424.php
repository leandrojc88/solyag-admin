<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035424 extends AbstratCoreMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE centro_costo ADD CONSTRAINT FK_749608CE1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE cierre ADD CONSTRAINT FK_D0DCFCC739161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE cierre ADD CONSTRAINT FK_D0DCFCC77EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cierre_diario ADD CONSTRAINT FK_F3D0CD8939161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE cierre_diario ADD CONSTRAINT FK_F3D0CD897EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cliente_solicitudes ADD CONSTRAINT FK_D0874AE67BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE cliente_solicitudes ADD CONSTRAINT FK_D0874AE63F78A396 FOREIGN KEY (id_solicitud_id) REFERENCES solicitud (id)');
        $this->addSql('ALTER TABLE cliente_solicitudes ADD CONSTRAINT FK_D0874AE61D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE cobros_pagos ADD CONSTRAINT FK_D9581D1655C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE cobros_pagos ADD CONSTRAINT FK_D9581D1626990C38 FOREIGN KEY (id_informe_id) REFERENCES informe_recepcion (id)');
        $this->addSql('ALTER TABLE cobros_pagos ADD CONSTRAINT FK_D9581D16E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE cobros_pagos ADD CONSTRAINT FK_D9581D167786CA71 FOREIGN KEY (id_movimiento_activo_fijo_id) REFERENCES movimiento_activo_fijo (id)');
        $this->addSql('ALTER TABLE comprobante_cierre ADD CONSTRAINT FK_D03EA4C51800963C FOREIGN KEY (id_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE comprobante_cierre ADD CONSTRAINT FK_D03EA4C545F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre (id)');
        $this->addSql('ALTER TABLE comprobante_movimiento_activo_fijo ADD CONSTRAINT FK_81F5096A1399A3CF FOREIGN KEY (id_registro_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE comprobante_movimiento_activo_fijo ADD CONSTRAINT FK_81F5096A9D00B230 FOREIGN KEY (id_movimiento_activo_id) REFERENCES movimiento_activo_fijo (id)');
        $this->addSql('ALTER TABLE comprobante_movimiento_activo_fijo ADD CONSTRAINT FK_81F5096A1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE comprobante_salario ADD CONSTRAINT FK_8C5550701399A3CF FOREIGN KEY (id_registro_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE comprobante_salario ADD CONSTRAINT FK_8C5550701D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE config_precio_venta_servicio ADD CONSTRAINT FK_6A244E601D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE config_servicios ADD CONSTRAINT FK_A1A8B71269D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE config_servicios ADD CONSTRAINT FK_A1A8B7121D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE configuracion_inicial ADD CONSTRAINT FK_8521BE24404AE9D2 FOREIGN KEY (id_modulo_id) REFERENCES modulo (id)');
        $this->addSql('ALTER TABLE configuracion_inicial ADD CONSTRAINT FK_8521BE247A4F962 FOREIGN KEY (id_tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE configuracion_reglas_remesas ADD CONSTRAINT FK_2398566118997CB6 FOREIGN KEY (id_pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE configuracion_reglas_remesas ADD CONSTRAINT FK_23985661E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE configuracion_reglas_remesas ADD CONSTRAINT FK_239856611D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE consecutivo_servicio ADD CONSTRAINT FK_EAB6E3871D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE consecutivo_servicio ADD CONSTRAINT FK_EAB6E38769D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE consecutivo_servicio ADD CONSTRAINT FK_EAB6E3878E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE contratos_cliente ADD CONSTRAINT FK_29A5BB477BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente_contabilidad (id)');
        $this->addSql('ALTER TABLE contratos_cliente ADD CONSTRAINT FK_29A5BB47374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE cotizacion ADD CONSTRAINT FK_44A5EC031D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE creditos_precio_venta ADD CONSTRAINT FK_847FE8A94699DFE5 FOREIGN KEY (id_config_precio_venta_id) REFERENCES config_precio_venta_servicio (id)');
        $this->addSql('ALTER TABLE creditos_precio_venta ADD CONSTRAINT FK_847FE8A91D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE cuadre_diario ADD CONSTRAINT FK_60ABEFD91ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE cuadre_diario ADD CONSTRAINT FK_60ABEFD92D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE cuadre_diario ADD CONSTRAINT FK_60ABEFD945F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre (id)');
        $this->addSql('ALTER TABLE cuadre_diario ADD CONSTRAINT FK_60ABEFD939161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE cuenta ADD CONSTRAINT FK_31C7BFCF45E7F350 FOREIGN KEY (id_tipo_cuenta_id) REFERENCES tipo_cuenta (id)');
        $this->addSql('ALTER TABLE cuenta_criterio_analisis ADD CONSTRAINT FK_AF040B091ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE cuenta_criterio_analisis ADD CONSTRAINT FK_AF040B095ABBE5F6 FOREIGN KEY (id_criterio_analisis_id) REFERENCES criterio_analisis (id)');
        $this->addSql('ALTER TABLE cuentas_cliente ADD CONSTRAINT FK_64653310374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE cuentas_cliente ADD CONSTRAINT FK_646533107BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente_contabilidad (id)');
        $this->addSql('ALTER TABLE cuentas_cliente ADD CONSTRAINT FK_646533109CDF4BAB FOREIGN KEY (id_banco_id) REFERENCES banco (id)');
        $this->addSql('ALTER TABLE cuentas_unidad ADD CONSTRAINT FK_355374209CDF4BAB FOREIGN KEY (id_banco_id) REFERENCES banco (id)');
        $this->addSql('ALTER TABLE cuentas_unidad ADD CONSTRAINT FK_355374201D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE cuentas_unidad ADD CONSTRAINT FK_35537420374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE custom_user ADD CONSTRAINT FK_8CE51EB479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE depreciacion ADD CONSTRAINT FK_D618AE149D01464C FOREIGN KEY (unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE descuestos_servicios_cotizacion ADD CONSTRAINT FK_1C606F008E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE descuestos_servicios_cotizacion ADD CONSTRAINT FK_1C606F0069D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE detalles_facturas ADD CONSTRAINT FK_38E68B7155C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE devolucion ADD CONSTRAINT FK_524D9F676601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        
    }
}
