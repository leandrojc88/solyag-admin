<?php

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;

final class Version20211126035423 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activo_fijo ADD CONSTRAINT FK_75EBC93EDB763453 FOREIGN KEY (id_tipo_movimiento_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE activo_fijo ADD CONSTRAINT FK_75EBC93E6FBA0327 FOREIGN KEY (id_tipo_movimiento_baja_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE activo_fijo ADD CONSTRAINT FK_75EBC93ED410562 FOREIGN KEY (id_area_responsabilidad_id) REFERENCES area_responsabilidad (id)');
        $this->addSql('ALTER TABLE activo_fijo ADD CONSTRAINT FK_75EBC93E4A667A2B FOREIGN KEY (id_grupo_activo_id) REFERENCES grupo_activos (id)');
        $this->addSql('ALTER TABLE activo_fijo ADD CONSTRAINT FK_75EBC93E1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF2901C84BDE84 FOREIGN KEY (id_activo_id) REFERENCES activo_fijo (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF290186762CC7 FOREIGN KEY (id_cuenta_activo_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF29014476721E FOREIGN KEY (id_subcuenta_activo_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF29012955A16D FOREIGN KEY (id_centro_costo_activo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF29014C675596 FOREIGN KEY (id_area_responsabilidad_activo_id) REFERENCES area_responsabilidad (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF290174A5FFBA FOREIGN KEY (id_cuenta_depreciacion_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF2901549C81D9 FOREIGN KEY (id_subcuenta_depreciacion_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF290180C608FA FOREIGN KEY (id_cuenta_gasto_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF290157677646 FOREIGN KEY (id_subcuenta_gasto_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF2901A950EE53 FOREIGN KEY (id_centro_costo_gasto_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF2901A752F04B FOREIGN KEY (id_elemento_gasto_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF29014D7B4AB9 FOREIGN KEY (id_cuenta_acreedora_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_cuentas ADD CONSTRAINT FK_E0DF2901EB1B341E FOREIGN KEY (id_subcuenta_acreedora_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE activo_fijo_movimiento_activo_fijo ADD CONSTRAINT FK_2FA61FF25832E72E FOREIGN KEY (id_activo_fijo_id) REFERENCES activo_fijo (id)');
        $this->addSql('ALTER TABLE activo_fijo_movimiento_activo_fijo ADD CONSTRAINT FK_2FA61FF27786CA71 FOREIGN KEY (id_movimiento_activo_fijo_id) REFERENCES movimiento (id)');
        $this->addSql('ALTER TABLE acumulado_vacaciones ADD CONSTRAINT FK_246B9D168D392AC7 FOREIGN KEY (id_empleado_id) REFERENCES empleado (id)');
        $this->addSql('ALTER TABLE ajuste ADD CONSTRAINT FK_DD35BD326601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE almacen ADD CONSTRAINT FK_D5B2D2501D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE almacen ADD CONSTRAINT FK_D5B2D250A59A1B0B FOREIGN KEY (id_cuenta_inventario_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE almacen_ocupado ADD CONSTRAINT FK_AA53605839161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE almacen_ocupado ADD CONSTRAINT FK_AA5360587EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE amenidades ADD CONSTRAINT FK_6D8A3B4D1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE amenidades_hotel ADD CONSTRAINT FK_2EB72C4C6298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE amenidades_hotel ADD CONSTRAINT FK_2EB72C4C91F48FAD FOREIGN KEY (id_amenidades_id) REFERENCES amenidades (id)');
        $this->addSql('ALTER TABLE apertura ADD CONSTRAINT FK_DFFB55EB6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE area_responsabilidad ADD CONSTRAINT FK_F469C2BA1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C1ADA4D3F FOREIGN KEY (id_cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C2D412F53 FOREIGN KEY (id_subcuenta_id) REFERENCES subcuenta (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C39161EBF FOREIGN KEY (id_almacen_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CC59B01FF FOREIGN KEY (id_centro_costo_id) REFERENCES centro_costo (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CF66372E9 FOREIGN KEY (id_elemento_gasto_id) REFERENCES elemento_gasto (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C71381BB3 FOREIGN KEY (id_orden_trabajo_id) REFERENCES orden_trabajo (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CF5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CEF5F7851 FOREIGN KEY (id_tipo_comprobante_id) REFERENCES tipo_comprobante (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C1800963C FOREIGN KEY (id_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C55C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C5832E72E FOREIGN KEY (id_activo_fijo_id) REFERENCES activo_fijo (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35CD410562 FOREIGN KEY (id_area_responsabilidad_id) REFERENCES area_responsabilidad (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C8E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C4CC57875 FOREIGN KEY (id_elemento_visa_id) REFERENCES elementos_visa (id)');
        $this->addSql('ALTER TABLE avisos_pagos ADD CONSTRAINT FK_F439673A78A65A2 FOREIGN KEY (id_plazo_pago_id) REFERENCES plazos_pago_cotizacion (id)');
        $this->addSql('ALTER TABLE avisos_pagos ADD CONSTRAINT FK_F4396738E5841CF FOREIGN KEY (id_cotizacion_id) REFERENCES cotizacion (id)');
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD CONSTRAINT FK_AE9DBD1E7BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD CONSTRAINT FK_AE9DBD1E18997CB6 FOREIGN KEY (id_pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD CONSTRAINT FK_AE9DBD1E6DB054DD FOREIGN KEY (id_provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD CONSTRAINT FK_AE9DBD1E7B7D6E92 FOREIGN KEY (id_municipio_id) REFERENCES municipios (id)');
    }
}
