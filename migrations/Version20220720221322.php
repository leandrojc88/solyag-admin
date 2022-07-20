<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720221322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recargas_cubacel_manual_to_dtone (id INT AUTO_INCREMENT NOT NULL, recarga_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', productid_dtone INT NOT NULL, date DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_DA5FD5530592E2 (recarga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recargas_cubacel_manual_to_dtone ADD CONSTRAINT FK_DA5FD5530592E2 FOREIGN KEY (recarga_id) REFERENCES servicio_empresa (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recargas_cubacel_manual_to_dtone');
    }
}
