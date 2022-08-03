<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220803151455 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE municipios ADD id_api INT NOT NULL');
        $this->addSql('ALTER TABLE pais ADD id_api INT NOT NULL');
        $this->addSql('ALTER TABLE provincias ADD id_api INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE municipios DROP id_api');
        $this->addSql('ALTER TABLE pais DROP id_api');
        $this->addSql('ALTER TABLE provincias DROP id_api');
    }
}
