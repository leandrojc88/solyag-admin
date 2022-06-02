<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601193219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE servicio_empresa (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', empresa_id INT NOT NULL, empleado_id INT NOT NULL, no_telefono VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, id_confir_proveedor INT DEFAULT NULL, date DATETIME NOT NULL, confirmation_date DATETIME DEFAULT NULL, servicio INT NOT NULL, response LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_1E4C04C521E1991 (empresa_id), INDEX IDX_1E4C04C952BE730 (empleado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE servicio_empresa ADD CONSTRAINT FK_1E4C04C521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE servicio_empresa ADD CONSTRAINT FK_1E4C04C952BE730 FOREIGN KEY (empleado_id) REFERENCES empleados (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE servicio_empresa');
    }
}
