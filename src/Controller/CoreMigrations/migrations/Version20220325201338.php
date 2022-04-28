<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325201338 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faltante ADD asentado TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD conciliado TINYINT(1) DEFAULT NULL, ADD asentado TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faltante DROP asentado');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP conciliado, DROP asentado');
    }
}
