<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331013216 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notificacion (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT DEFAULT NULL, notificacion VARCHAR(255) NOT NULL, visto TINYINT(1) NOT NULL, fecha_visto DATETIME DEFAULT NULL, fecha_creado DATETIME NOT NULL, INDEX IDX_729A19EC7EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notificacion ADD CONSTRAINT FK_729A19EC7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notificacion');
    }
}
