<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210054618 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apertura_caja_chica ADD id_turno_trabajo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apertura_caja_chica ADD CONSTRAINT FK_E3EFE8F6B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('CREATE INDEX IDX_E3EFE8F6B4D9859C ON apertura_caja_chica (id_turno_trabajo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apertura_caja_chica DROP FOREIGN KEY FK_E3EFE8F6B4D9859C');
        $this->addSql('DROP INDEX IDX_E3EFE8F6B4D9859C ON apertura_caja_chica');
        $this->addSql('ALTER TABLE apertura_caja_chica DROP id_turno_trabajo_id');
    }
}
