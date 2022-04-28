<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;
/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428185259 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fondo_cambio_apertura (id INT AUTO_INCREMENT NOT NULL, id_moneda_id INT NOT NULL, id_puesto_trabajo_id INT NOT NULL, monto DOUBLE PRECISION NOT NULL, INDEX IDX_B4AD8A36374388F5 (id_moneda_id), INDEX IDX_B4AD8A361ED9E395 (id_puesto_trabajo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fondo_cambio_apertura ADD CONSTRAINT FK_B4AD8A36374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE fondo_cambio_apertura ADD CONSTRAINT FK_B4AD8A361ED9E395 FOREIGN KEY (id_puesto_trabajo_id) REFERENCES puesto_trabajo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fondo_cambio_apertura');
    }
}
