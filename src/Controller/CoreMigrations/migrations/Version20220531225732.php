<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531225732 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gasto (id INT AUTO_INCREMENT NOT NULL, id_moneda_id INT NOT NULL, proveedor VARCHAR(255) DEFAULT NULL, importe DOUBLE PRECISION NOT NULL, fecha DATETIME NOT NULL, procedencia_gasto VARCHAR(255) NOT NULL, INDEX IDX_AE43DA14374388F5 (id_moneda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_gasto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gasto ADD CONSTRAINT FK_AE43DA14374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE factura ADD id_turno_trabajo_id INT DEFAULT NULL, ADD pos_pago TINYINT(1) DEFAULT NULL, ADD resto DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE factura ADD CONSTRAINT FK_F9EBA009B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('CREATE INDEX IDX_F9EBA009B4D9859C ON factura (id_turno_trabajo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gasto');
        $this->addSql('DROP TABLE tipo_gasto');
        $this->addSql('ALTER TABLE factura DROP FOREIGN KEY FK_F9EBA009B4D9859C');
        $this->addSql('DROP INDEX IDX_F9EBA009B4D9859C ON factura');
        $this->addSql('ALTER TABLE factura DROP id_turno_trabajo_id, DROP pos_pago, DROP resto');
    }
}
