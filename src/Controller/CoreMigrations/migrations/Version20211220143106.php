<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220143106 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen ADD humbral DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD entrada TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE mercancia ADD producto TINYINT(1) DEFAULT NULL, ADD existencia_minima DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen DROP humbral');
        $this->addSql('ALTER TABLE asiento DROP entrada');
        $this->addSql('ALTER TABLE mercancia DROP producto, DROP existencia_minima');
    }
}
