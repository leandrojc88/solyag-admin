<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323050541 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cierre_turno_moneda (id INT AUTO_INCREMENT NOT NULL, id_turno_trabajo_id INT NOT NULL, id_moneda_id INT NOT NULL, desglose LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_4972AAECB4D9859C (id_turno_trabajo_id), INDEX IDX_4972AAEC374388F5 (id_moneda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cobros_anticipado (id INT AUTO_INCREMENT NOT NULL, id_moneda_id INT NOT NULL, id_cliente_id INT NOT NULL, importe DOUBLE PRECISION NOT NULL, INDEX IDX_56D7F990374388F5 (id_moneda_id), INDEX IDX_56D7F9907BF9CE86 (id_cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cierre_turno_moneda ADD CONSTRAINT FK_4972AAECB4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('ALTER TABLE cierre_turno_moneda ADD CONSTRAINT FK_4972AAEC374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE cobros_anticipado ADD CONSTRAINT FK_56D7F990374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE cobros_anticipado ADD CONSTRAINT FK_56D7F9907BF9CE86 FOREIGN KEY (id_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE asiento ADD id_empleado_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C8D392AC7 FOREIGN KEY (id_empleado_id) REFERENCES empleado (id)');
        $this->addSql('CREATE INDEX IDX_71D6D35C8D392AC7 ON asiento (id_empleado_id)');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD vuelto DOUBLE PRECISION DEFAULT NULL, ADD fecha DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE faltante DROP FOREIGN KEY FK_9A5BE743F5DBAF2B');
        $this->addSql('DROP INDEX IDX_9A5BE743F5DBAF2B ON faltante');
        $this->addSql('ALTER TABLE faltante DROP id_expediente_id');
        $this->addSql('ALTER TABLE subcuenta ADD bloqueado TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE traspaso ADD id_unidad_id INT NOT NULL, ADD rechazado TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE traspaso ADD CONSTRAINT FK_B02090961D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('CREATE INDEX IDX_B02090961D34FA6B ON traspaso (id_unidad_id)');
        $this->addSql('ALTER TABLE turno_trabajo ADD fecha_cierre DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD id_moneda_id INT NOT NULL, ADD tipo INT NOT NULL, ADD valor_real DOUBLE PRECISION DEFAULT NULL, CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D0374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('CREATE INDEX IDX_E64D25D0374388F5 ON vale_salida_caja_chica (id_moneda_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cierre_turno_moneda');
        $this->addSql('DROP TABLE cobros_anticipado');
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C8D392AC7');
        $this->addSql('DROP INDEX IDX_71D6D35C8D392AC7 ON asiento');
        $this->addSql('ALTER TABLE asiento DROP id_empleado_id');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica DROP vuelto, DROP fecha');
        $this->addSql('ALTER TABLE faltante ADD id_expediente_id INT NOT NULL');
        $this->addSql('ALTER TABLE faltante ADD CONSTRAINT FK_9A5BE743F5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('CREATE INDEX IDX_9A5BE743F5DBAF2B ON faltante (id_expediente_id)');
        $this->addSql('ALTER TABLE subcuenta DROP bloqueado');
        $this->addSql('ALTER TABLE traspaso DROP FOREIGN KEY FK_B02090961D34FA6B');
        $this->addSql('DROP INDEX IDX_B02090961D34FA6B ON traspaso');
        $this->addSql('ALTER TABLE traspaso DROP id_unidad_id, DROP rechazado');
        $this->addSql('ALTER TABLE turno_trabajo DROP fecha_cierre');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP FOREIGN KEY FK_E64D25D0374388F5');
        $this->addSql('DROP INDEX IDX_E64D25D0374388F5 ON vale_salida_caja_chica');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP id_moneda_id, DROP tipo, DROP valor_real, CHANGE fecha fecha DATE NOT NULL');
    }
}
