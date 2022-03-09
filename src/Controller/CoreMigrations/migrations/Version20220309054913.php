<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309054913 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cierre ADD id_comprobante_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cierre ADD CONSTRAINT FK_D0DCFCC71800963C FOREIGN KEY (id_comprobante_id) REFERENCES registro_comprobantes (id)');
        $this->addSql('CREATE INDEX IDX_D0DCFCC71800963C ON cierre (id_comprobante_id)');
        $this->addSql('ALTER TABLE registro_comprobantes CHANGE id_usuario_id id_usuario_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cierre DROP FOREIGN KEY FK_D0DCFCC71800963C');
        $this->addSql('DROP INDEX IDX_D0DCFCC71800963C ON cierre');
        $this->addSql('ALTER TABLE cierre DROP id_comprobante_id');
        $this->addSql('ALTER TABLE registro_comprobantes CHANGE id_usuario_id id_usuario_id INT NOT NULL');
    }
}
