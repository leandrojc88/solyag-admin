<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208225337 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cobros_dia_caja_chica DROP FOREIGN KEY FK_F7CB710545F8C94C');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP FOREIGN KEY FK_E64D25D045F8C94C');
        $this->addSql('CREATE TABLE faltante (id INT AUTO_INCREMENT NOT NULL, id_usurario_id INT NOT NULL, id_turno_trabajo_id INT NOT NULL, id_moneda_id INT NOT NULL, id_expediente_id INT NOT NULL, importe DOUBLE PRECISION NOT NULL, INDEX IDX_9A5BE743B093A996 (id_usurario_id), INDEX IDX_9A5BE743B4D9859C (id_turno_trabajo_id), INDEX IDX_9A5BE743374388F5 (id_moneda_id), INDEX IDX_9A5BE743F5DBAF2B (id_expediente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE faltante ADD CONSTRAINT FK_9A5BE743B093A996 FOREIGN KEY (id_usurario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE faltante ADD CONSTRAINT FK_9A5BE743B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('ALTER TABLE faltante ADD CONSTRAINT FK_9A5BE743374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE faltante ADD CONSTRAINT FK_9A5BE743F5DBAF2B FOREIGN KEY (id_expediente_id) REFERENCES expediente (id)');
        $this->addSql('DROP TABLE cierre_caja');
        $this->addSql('DROP INDEX IDX_F7CB710545F8C94C ON cobros_dia_caja_chica');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD efectivo TINYINT(1) DEFAULT NULL, DROP id_cierre_id');
        $this->addSql('ALTER TABLE turno_trabajo ADD desglose LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', ADD conciliado TINYINT(1) DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_E64D25D045F8C94C ON vale_salida_caja_chica');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD id_turno_trabajo_id INT NOT NULL, DROP id_cierre_id');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D0B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('CREATE INDEX IDX_E64D25D0B4D9859C ON vale_salida_caja_chica (id_turno_trabajo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cierre_caja (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, fehca DATE NOT NULL, INDEX IDX_2B6E108179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cierre_caja ADD CONSTRAINT FK_2B6E108179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE faltante');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD id_cierre_id INT DEFAULT NULL, DROP efectivo');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD CONSTRAINT FK_F7CB710545F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre_caja (id)');
        $this->addSql('CREATE INDEX IDX_F7CB710545F8C94C ON cobros_dia_caja_chica (id_cierre_id)');
        $this->addSql('ALTER TABLE turno_trabajo DROP desglose, DROP conciliado');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP FOREIGN KEY FK_E64D25D0B4D9859C');
        $this->addSql('DROP INDEX IDX_E64D25D0B4D9859C ON vale_salida_caja_chica');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD id_cierre_id INT DEFAULT NULL, DROP id_turno_trabajo_id');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D045F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre_caja (id)');
        $this->addSql('CREATE INDEX IDX_E64D25D045F8C94C ON vale_salida_caja_chica (id_cierre_id)');
    }
}
