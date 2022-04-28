<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124210415 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gastos_pagar (id INT AUTO_INCREMENT NOT NULL, id_factura_id INT NOT NULL, id_proveedor_id INT NOT NULL, id_unidad_id INT DEFAULT NULL, importe DOUBLE PRECISION NOT NULL, nro_factura_proveedor VARCHAR(255) DEFAULT NULL, fecha_factura_proveedor DATE DEFAULT NULL, INDEX IDX_DADA832B55C5F988 (id_factura_id), INDEX IDX_DADA832BE8F12801 (id_proveedor_id), INDEX IDX_DADA832B1D34FA6B (id_unidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gastos_pagar ADD CONSTRAINT FK_DADA832B55C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE gastos_pagar ADD CONSTRAINT FK_DADA832BE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE gastos_pagar ADD CONSTRAINT FK_DADA832B1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gastos_pagar');
    }
}
