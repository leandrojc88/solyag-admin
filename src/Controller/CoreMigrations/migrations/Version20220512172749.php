<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512172749 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pago_anticipado (id INT AUTO_INCREMENT NOT NULL, id_moneda_id INT NOT NULL, id_proveedor_id INT NOT NULL, importe DOUBLE PRECISION NOT NULL, INDEX IDX_7A19A984374388F5 (id_moneda_id), INDEX IDX_7A19A984E8F12801 (id_proveedor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pago_anticipado ADD CONSTRAINT FK_7A19A984374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE pago_anticipado ADD CONSTRAINT FK_7A19A984E8F12801 FOREIGN KEY (id_proveedor_id) REFERENCES proveedor (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pago_anticipado');
    }
}
