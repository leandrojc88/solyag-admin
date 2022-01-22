<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220122165248 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones ADD nro_cta VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE saldo_cuentas ADD id_cuentas_unidad_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE saldo_cuentas ADD CONSTRAINT FK_BB2B71AE160A574E FOREIGN KEY (id_cuentas_unidad_id) REFERENCES cuentas_unidad (id)');
        $this->addSql('CREATE INDEX IDX_BB2B71AE160A574E ON saldo_cuentas (id_cuentas_unidad_id)');
        $this->addSql('ALTER TABLE tasa_cambio ADD fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE unidad ADD cierre_automatico TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operaciones_comprobante_operaciones DROP nro_cta');
        $this->addSql('ALTER TABLE saldo_cuentas DROP FOREIGN KEY FK_BB2B71AE160A574E');
        $this->addSql('DROP INDEX IDX_BB2B71AE160A574E ON saldo_cuentas');
        $this->addSql('ALTER TABLE saldo_cuentas DROP id_cuentas_unidad_id');
        $this->addSql('ALTER TABLE tasa_cambio DROP fecha');
        $this->addSql('ALTER TABLE unidad DROP cierre_automatico');
    }
}
