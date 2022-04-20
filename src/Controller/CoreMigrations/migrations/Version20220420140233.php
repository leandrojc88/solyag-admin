<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420140233 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banco DROP zelle, DROP tarjeta_presencial');
        $this->addSql('ALTER TABLE cuentas_unidad ADD zelle TINYINT(1) DEFAULT NULL, ADD transferencia TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banco ADD zelle TINYINT(1) DEFAULT NULL, ADD tarjeta_presencial TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cuentas_unidad DROP zelle, DROP transferencia');
    }
}
