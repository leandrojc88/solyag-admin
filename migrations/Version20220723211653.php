<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220723211653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campanna_config (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, saldo DOUBLE PRECISION NOT NULL, costo DOUBLE PRECISION NOT NULL, INDEX IDX_9E96E95F521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history_saldo_campanna (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, user_id INT NOT NULL, fecha DATETIME NOT NULL, saldo DOUBLE PRECISION NOT NULL, tipo VARCHAR(255) NOT NULL, INDEX IDX_397B2B22521E1991 (empresa_id), INDEX IDX_397B2B22A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campanna_config ADD CONSTRAINT FK_9E96E95F521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE history_saldo_campanna ADD CONSTRAINT FK_397B2B22521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE history_saldo_campanna ADD CONSTRAINT FK_397B2B22A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE campanna_config');
        $this->addSql('DROP TABLE history_saldo_campanna');
    }
}
