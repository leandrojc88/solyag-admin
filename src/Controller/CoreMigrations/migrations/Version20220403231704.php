<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403231704 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario_pos_venta (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, tab_venta INT NOT NULL, fecha DATETIME NOT NULL, productos LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_FFC7E6A27EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario_pos_venta ADD CONSTRAINT FK_FFC7E6A27EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usuario_pos_venta');
    }
}
