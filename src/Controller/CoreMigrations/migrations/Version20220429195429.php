<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429195429 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fondo_cambio_apertura ADD id_turno_trabajo_id INT NOT NULL, ADD aperturado TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE fondo_cambio_apertura ADD CONSTRAINT FK_B4AD8A36B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('CREATE INDEX IDX_B4AD8A36B4D9859C ON fondo_cambio_apertura (id_turno_trabajo_id)');
        $this->addSql('ALTER TABLE turno_trabajo ADD fecha_apertura DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fondo_cambio_apertura DROP FOREIGN KEY FK_B4AD8A36B4D9859C');
        $this->addSql('DROP INDEX IDX_B4AD8A36B4D9859C ON fondo_cambio_apertura');
        $this->addSql('ALTER TABLE fondo_cambio_apertura DROP id_turno_trabajo_id, DROP aperturado');
        $this->addSql('ALTER TABLE turno_trabajo DROP fecha_apertura');
    }
}
