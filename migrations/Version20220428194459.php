<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428194459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE custom_user (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, nombre_completo VARCHAR(255) NOT NULL, correo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8CE51EB479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empleados (id INT AUTO_INCREMENT NOT NULL, id_empresa_id INT NOT NULL, correo VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, administrador TINYINT(1) DEFAULT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_9EB2266CF7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa_cierre (id INT AUTO_INCREMENT NOT NULL, empresa_id INT DEFAULT NULL, id_agencia INT NOT NULL, cierre TINYINT(1) NOT NULL, INDEX IDX_443C1C5E521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, identificacion VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, nro_contrato VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, correo VARCHAR(255) DEFAULT NULL, siglas VARCHAR(255) NOT NULL, ready TINYINT(1) DEFAULT NULL, restore TINYINT(1) DEFAULT NULL, restore_test TINYINT(1) NOT NULL, icono VARCHAR(255) DEFAULT NULL, icono_ticket VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulos (id INT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulos_empresas (id INT AUTO_INCREMENT NOT NULL, id_modulo_id INT NOT NULL, id_empresa_id INT NOT NULL, INDEX IDX_B3B2A8D7404AE9D2 (id_modulo_id), INDEX IDX_B3B2A8D7F7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pais (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', status TINYINT(1) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE custom_user ADD CONSTRAINT FK_8CE51EB479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE empleados ADD CONSTRAINT FK_9EB2266CF7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE empresa_cierre ADD CONSTRAINT FK_443C1C5E521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE modulos_empresas ADD CONSTRAINT FK_B3B2A8D7404AE9D2 FOREIGN KEY (id_modulo_id) REFERENCES modulos (id)');
        $this->addSql('ALTER TABLE modulos_empresas ADD CONSTRAINT FK_B3B2A8D7F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empleados DROP FOREIGN KEY FK_9EB2266CF7949946');
        $this->addSql('ALTER TABLE empresa_cierre DROP FOREIGN KEY FK_443C1C5E521E1991');
        $this->addSql('ALTER TABLE modulos_empresas DROP FOREIGN KEY FK_B3B2A8D7F7949946');
        $this->addSql('ALTER TABLE modulos_empresas DROP FOREIGN KEY FK_B3B2A8D7404AE9D2');
        $this->addSql('ALTER TABLE custom_user DROP FOREIGN KEY FK_8CE51EB479F37AE5');
        $this->addSql('DROP TABLE custom_user');
        $this->addSql('DROP TABLE empleados');
        $this->addSql('DROP TABLE empresa_cierre');
        $this->addSql('DROP TABLE empresas');
        $this->addSql('DROP TABLE modulos');
        $this->addSql('DROP TABLE modulos_empresas');
        $this->addSql('DROP TABLE pais');
        $this->addSql('DROP TABLE user');
    }
}
