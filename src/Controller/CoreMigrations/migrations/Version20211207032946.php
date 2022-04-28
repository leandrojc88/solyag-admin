<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207032946 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen ADD mercancia TINYINT(1) DEFAULT NULL, ADD producto TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cotizacion ADD pos_venta TINYINT(1) DEFAULT NULL, ADD fecha_actualizacion DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE mercancia ADD precio_oferta DOUBLE PRECISION DEFAULT NULL, ADD inicio_oferta DATE DEFAULT NULL, ADD fin_oferta DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE producto ADD precio_oferta DOUBLE PRECISION DEFAULT NULL, ADD inicio_oferta DATE DEFAULT NULL, ADD fin_oferta DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE almacen DROP mercancia, DROP producto');
        $this->addSql('ALTER TABLE cotizacion DROP pos_venta, DROP fecha_actualizacion');
        $this->addSql('ALTER TABLE mercancia DROP precio_oferta, DROP inicio_oferta, DROP fin_oferta');
        $this->addSql('ALTER TABLE producto DROP precio_oferta, DROP inicio_oferta, DROP fin_oferta');
    }
}
