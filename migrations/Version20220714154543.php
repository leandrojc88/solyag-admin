<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714154543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE factura (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', empresa_id INT NOT NULL, no_factura INT NOT NULL, fecha DATETIME NOT NULL, moneda VARCHAR(255) NOT NULL, periodo_inicio DATETIME NOT NULL, periodo_fin DATETIME NOT NULL, INDEX IDX_F9EBA009521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE empresa_larga_distancia_register ADD factura_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE empresa_larga_distancia_register ADD CONSTRAINT FK_2C2C35C6F04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('CREATE INDEX IDX_2C2C35C6F04F795F ON empresa_larga_distancia_register (factura_id)');
        $this->addSql('ALTER TABLE servicio_empresa ADD factura_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE servicio_empresa ADD CONSTRAINT FK_1E4C04CF04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('CREATE INDEX IDX_1E4C04CF04F795F ON servicio_empresa (factura_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empresa_larga_distancia_register DROP FOREIGN KEY FK_2C2C35C6F04F795F');
        $this->addSql('ALTER TABLE servicio_empresa DROP FOREIGN KEY FK_1E4C04CF04F795F');
        $this->addSql('DROP TABLE factura');
        $this->addSql('DROP INDEX IDX_2C2C35C6F04F795F ON empresa_larga_distancia_register');
        $this->addSql('ALTER TABLE empresa_larga_distancia_register DROP factura_id');
        $this->addSql('DROP INDEX IDX_1E4C04CF04F795F ON servicio_empresa');
        $this->addSql('ALTER TABLE servicio_empresa DROP factura_id');
    }
}
