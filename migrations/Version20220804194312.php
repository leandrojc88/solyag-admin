<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220804194312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE moneda_pais (id INT AUTO_INCREMENT NOT NULL, pais_id INT DEFAULT NULL, empresa_id INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, moneda VARCHAR(255) NOT NULL, valor_conversion DOUBLE PRECISION DEFAULT NULL, INDEX IDX_858ADC37C604D5C6 (pais_id), INDEX IDX_858ADC37521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE moneda_pais ADD CONSTRAINT FK_858ADC37C604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE moneda_pais ADD CONSTRAINT FK_858ADC37521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE moneda_pais');
    }
}
