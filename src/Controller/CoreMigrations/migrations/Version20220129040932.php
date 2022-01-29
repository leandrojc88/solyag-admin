<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220129040932 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura ADD id_moneda_cliente_id INT DEFAULT NULL, ADD tasa_cambio DOUBLE PRECISION DEFAULT NULL, ADD importe_cliente DOUBLE PRECISION DEFAULT NULL, ADD resto_pagar_cliente DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009E219A4B3 FOREIGN KEY (id_moneda_cliente_id) REFERENCES moneda (id)');
        $this->addSql('CREATE INDEX IDX_F9EBA009E219A4B3 ON factura (id_moneda_cliente_id)');
        $this->addSql('ALTER TABLE proveedor DROP FOREIGN KEY FK_16C068CEC604D5C6');
        $this->addSql('DROP INDEX IDX_16C068CEC604D5C6 ON proveedor');
        $this->addSql('ALTER TABLE proveedor CHANGE pais_id id_moneda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proveedor ADD CONSTRAINT FK_16C068CE374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('CREATE INDEX IDX_16C068CE374388F5 ON proveedor (id_moneda_id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD id_moneda_id INT DEFAULT NULL, ADD id_moneda_unidad_id INT DEFAULT NULL, ADD tasa_cambio DOUBLE PRECISION DEFAULT NULL, ADD costo_moneda_unidad DOUBLE PRECISION DEFAULT NULL, ADD precio_moneda_unidad DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91E374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91EF40F7568 FOREIGN KEY (id_moneda_unidad_id) REFERENCES moneda (id)');
        $this->addSql('CREATE INDEX IDX_68EBF91E374388F5 ON proveedor_unidad_servicios (id_moneda_id)');
        $this->addSql('CREATE INDEX IDX_68EBF91EF40F7568 ON proveedor_unidad_servicios (id_moneda_unidad_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA009E219A4B3');
        $this->addSql('DROP INDEX IDX_F9EBA009E219A4B3 ON factura');
        $this->addSql('ALTER TABLE factura DROP id_moneda_cliente_id, DROP tasa_cambio, DROP importe_cliente, DROP resto_pagar_cliente');
        $this->addSql('ALTER TABLE proveedor DROP FOREIGN KEY FK_16C068CE374388F5');
        $this->addSql('DROP INDEX IDX_16C068CE374388F5 ON proveedor');
        $this->addSql('ALTER TABLE proveedor CHANGE id_moneda_id pais_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proveedor ADD CONSTRAINT FK_16C068CEC604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('CREATE INDEX IDX_16C068CEC604D5C6 ON proveedor (pais_id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios DROP FOREIGN KEY FK_68EBF91E374388F5');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios DROP FOREIGN KEY FK_68EBF91EF40F7568');
        $this->addSql('DROP INDEX IDX_68EBF91E374388F5 ON proveedor_unidad_servicios');
        $this->addSql('DROP INDEX IDX_68EBF91EF40F7568 ON proveedor_unidad_servicios');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios DROP id_moneda_id, DROP id_moneda_unidad_id, DROP tasa_cambio, DROP costo_moneda_unidad, DROP precio_moneda_unidad');
    }
}
