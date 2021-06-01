<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531164400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administradores (id INT AUTO_INCREMENT NOT NULL, id_empresa_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, usuario VARCHAR(255) NOT NULL, contrasenna VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_BA7CABE6F7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administradores ADD CONSTRAINT FK_BA7CABE6F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE administradores');
    }
}
