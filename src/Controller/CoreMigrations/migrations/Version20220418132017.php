<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220418132017 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notas_servicios (id INT AUTO_INCREMENT NOT NULL, id_servicio_id INT NOT NULL, id_subservicio_id INT DEFAULT NULL, nota VARCHAR(255) DEFAULT NULL, automatica TINYINT(1) DEFAULT NULL, INDEX IDX_62C52E6D69D86E10 (id_servicio_id), INDEX IDX_62C52E6D32C7D54 (id_subservicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notas_servicios ADD CONSTRAINT FK_62C52E6D69D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('ALTER TABLE notas_servicios ADD CONSTRAINT FK_62C52E6D32C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notas_servicios');
    }
}
