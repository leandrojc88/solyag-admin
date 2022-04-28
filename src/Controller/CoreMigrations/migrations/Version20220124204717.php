<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124204717 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asiento ADD id_usuario_id INT DEFAULT NULL, ADD id_moneda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('CREATE INDEX IDX_71D6D35C7EB2C349 ON asiento (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_71D6D35C374388F5 ON asiento (id_moneda_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C7EB2C349');
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C374388F5');
        $this->addSql('DROP INDEX IDX_71D6D35C7EB2C349 ON asiento');
        $this->addSql('DROP INDEX IDX_71D6D35C374388F5 ON asiento');
        $this->addSql('ALTER TABLE asiento DROP id_usuario_id, DROP id_moneda_id');
    }
}
