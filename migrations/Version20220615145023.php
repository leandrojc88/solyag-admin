<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615145023 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE servicios (id INT NOT NULL, nombre VARCHAR(255) NOT NULL, codigo VARCHAR(255) NOT NULL, abreviatura VARCHAR(20) DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subservicio (id INT AUTO_INCREMENT NOT NULL, id_servicio_id INT NOT NULL, descripcion VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_C0164FA369D86E10 (id_servicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subservicio ADD CONSTRAINT FK_C0164FA369D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subservicio DROP FOREIGN KEY FK_C0164FA369D86E10');
        $this->addSql('DROP TABLE servicios');
        $this->addSql('DROP TABLE subservicio');
    }
}