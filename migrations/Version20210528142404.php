<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528142404 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empleados (id INT AUTO_INCREMENT NOT NULL, id_empresa_id INT NOT NULL, correo VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_9EB2266CF7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, identificacion VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, nro_contrato VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, correo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulos_empresas (id INT AUTO_INCREMENT NOT NULL, id_modulo_id INT NOT NULL, id_empresa_id INT NOT NULL, INDEX IDX_B3B2A8D7404AE9D2 (id_modulo_id), INDEX IDX_B3B2A8D7F7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empleados ADD CONSTRAINT FK_9EB2266CF7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE modulos_empresas ADD CONSTRAINT FK_B3B2A8D7404AE9D2 FOREIGN KEY (id_modulo_id) REFERENCES modulos (id)');
        $this->addSql('ALTER TABLE modulos_empresas ADD CONSTRAINT FK_B3B2A8D7F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE user DROP id_moneda, DROP id_agencia');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empleados DROP FOREIGN KEY FK_9EB2266CF7949946');
        $this->addSql('ALTER TABLE modulos_empresas DROP FOREIGN KEY FK_B3B2A8D7F7949946');
        $this->addSql('ALTER TABLE modulos_empresas DROP FOREIGN KEY FK_B3B2A8D7404AE9D2');
        $this->addSql('DROP TABLE empleados');
        $this->addSql('DROP TABLE empresas');
        $this->addSql('DROP TABLE modulos');
        $this->addSql('DROP TABLE modulos_empresas');
        $this->addSql('ALTER TABLE user ADD id_moneda VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD id_agencia VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
