<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628191852 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen ADD consignacion_venta TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD cobro_anticipado TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen DROP consignacion_venta');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica DROP cobro_anticipado');
    }
}
