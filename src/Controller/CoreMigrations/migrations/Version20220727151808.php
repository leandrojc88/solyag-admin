<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727151808 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campanna_sms (id INT AUTO_INCREMENT NOT NULL, costo_unitario DOUBLE PRECISION NOT NULL, fecha DATETIME NOT NULL, mensaje VARCHAR(255) NOT NULL, cantidad_clientes INT NOT NULL, finished TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campanna_sms_cliente (id INT AUTO_INCREMENT NOT NULL, campanna_sms_id INT NOT NULL, cleinte_id INT NOT NULL, fecha DATETIME NOT NULL, sended TINYINT(1) NOT NULL, INDEX IDX_CEEB496AF740B843 (campanna_sms_id), INDEX IDX_CEEB496A4E7C316A (cleinte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campanna_sms_cliente ADD CONSTRAINT FK_CEEB496AF740B843 FOREIGN KEY (campanna_sms_id) REFERENCES campanna_sms (id)');
        $this->addSql('ALTER TABLE campanna_sms_cliente ADD CONSTRAINT FK_CEEB496A4E7C316A FOREIGN KEY (cleinte_id) REFERENCES cliente (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campanna_sms_cliente DROP FOREIGN KEY FK_CEEB496AF740B843');
        $this->addSql('DROP TABLE campanna_sms');
        $this->addSql('DROP TABLE campanna_sms_cliente');
    }
}
