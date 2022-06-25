<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220625220239 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detalle_mercancia_consignacion (id INT AUTO_INCREMENT NOT NULL, id_proveedor_id INT NOT NULL, id_mercancia_id INT NOT NULL, id_documento_id INT DEFAULT NULL, cantidad DOUBLE PRECISION NOT NULL, costo DOUBLE PRECISION NOT NULL, fecha DATETIME DEFAULT NULL, nro_documento VARCHAR(255) DEFAULT NULL, INDEX IDX_19CFAC7FE8F12801 (id_proveedor_id), INDEX IDX_19CFAC7F9F287F54 (id_mercancia_id), INDEX IDX_19CFAC7F6601BA07 (id_documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detalle_mercancia_consignacion ADD CONSTRAINT FK_19CFAC7FE8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
        $this->addSql('ALTER TABLE detalle_mercancia_consignacion ADD CONSTRAINT FK_19CFAC7F9F287F54 FOREIGN KEY (id_mercancia_id) REFERENCES mercancia (id)');
        $this->addSql('ALTER TABLE detalle_mercancia_consignacion ADD CONSTRAINT FK_19CFAC7F6601BA07 FOREIGN KEY (id_documento_id) REFERENCES documento (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detalle_mercancia_consignacion');
    }
}
