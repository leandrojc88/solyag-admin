<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220618193603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servicio_empresa ADD sub_servicio_id INT DEFAULT NULL, DROP sub_servicio');
        $this->addSql('ALTER TABLE servicio_empresa ADD CONSTRAINT FK_1E4C04C9433D679 FOREIGN KEY (sub_servicio_id) REFERENCES subservicio (id)');
        $this->addSql('CREATE INDEX IDX_1E4C04C9433D679 ON servicio_empresa (sub_servicio_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servicio_empresa DROP FOREIGN KEY FK_1E4C04C9433D679');
        $this->addSql('DROP INDEX IDX_1E4C04C9433D679 ON servicio_empresa');
        $this->addSql('ALTER TABLE servicio_empresa ADD sub_servicio VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP sub_servicio_id');
    }
}
