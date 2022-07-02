<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220702165409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE historial_saldo_empresa (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, user_id INT NOT NULL, fecha DATETIME NOT NULL, saldo DOUBLE PRECISION NOT NULL, INDEX IDX_409DDC30521E1991 (empresa_id), INDEX IDX_409DDC30A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historial_saldo_empresa ADD CONSTRAINT FK_409DDC30521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE historial_saldo_empresa ADD CONSTRAINT FK_409DDC30A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE historial_saldo_empresa');
    }
}
