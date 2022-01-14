<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220114041737 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asiento ADD id_cuentas_unidad_id INT DEFAULT NULL, ADD nro_doc_mostrar VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C160A574E FOREIGN KEY (id_cuentas_unidad_id) REFERENCES cuentas_unidad (id)');
        $this->addSql('CREATE INDEX IDX_71D6D35C160A574E ON asiento (id_cuentas_unidad_id)');
        $this->addSql('ALTER TABLE banco ADD codigo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C160A574E');
        $this->addSql('DROP INDEX IDX_71D6D35C160A574E ON asiento');
        $this->addSql('ALTER TABLE asiento DROP id_cuentas_unidad_id, DROP nro_doc_mostrar');
        $this->addSql('ALTER TABLE banco DROP codigo');
    }
}
