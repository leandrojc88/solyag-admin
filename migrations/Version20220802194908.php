<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220802194908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE municipios (id INT AUTO_INCREMENT NOT NULL, provincia_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_BBFAB5864E7121AF (provincia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provincias (id INT AUTO_INCREMENT NOT NULL, pais_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, id_pais INT DEFAULT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_9F631427C604D5C6 (pais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE municipios ADD CONSTRAINT FK_BBFAB5864E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE provincias ADD CONSTRAINT FK_9F631427C604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE municipios DROP FOREIGN KEY FK_BBFAB5864E7121AF');
        $this->addSql('DROP TABLE municipios');
        $this->addSql('DROP TABLE provincias');
    }
}
