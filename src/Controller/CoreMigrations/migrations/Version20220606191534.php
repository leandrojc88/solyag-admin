<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220606191534 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuentas_unidad ADD importe DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE gasto ADD id_tipo_gasto_id INT DEFAULT NULL, ADD id_registro_comprobante_id INT DEFAULT NULL, ADD contabilizado TINYINT(1) NOT NULL, ADD cuenta_bancaria VARCHAR(255) DEFAULT NULL, ADD pago_efectivo TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE gasto ADD CONSTRAINT FK_AE43DA1481817821 FOREIGN KEY (id_tipo_gasto_id) REFERENCES tipo_gasto (id)');
        $this->addSql('ALTER TABLE gasto ADD CONSTRAINT FK_AE43DA141399A3CF FOREIGN KEY (id_registro_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('CREATE INDEX IDX_AE43DA1481817821 ON gasto (id_tipo_gasto_id)');
        $this->addSql('CREATE INDEX IDX_AE43DA141399A3CF ON gasto (id_registro_comprobante_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuentas_unidad DROP importe');
        $this->addSql('ALTER TABLE gasto DROP FOREIGN KEY FK_AE43DA1481817821');
        $this->addSql('ALTER TABLE gasto DROP FOREIGN KEY FK_AE43DA141399A3CF');
        $this->addSql('DROP INDEX IDX_AE43DA1481817821 ON gasto');
        $this->addSql('DROP INDEX IDX_AE43DA141399A3CF ON gasto');
        $this->addSql('ALTER TABLE gasto DROP id_tipo_gasto_id, DROP id_registro_comprobante_id, DROP contabilizado, DROP cuenta_bancaria, DROP pago_efectivo');
    }
}
