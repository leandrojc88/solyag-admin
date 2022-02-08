<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207232412 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cierre_caja (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, fehca DATE NOT NULL, INDEX IDX_2B6E108179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cobros_dia_caja_chica (id INT AUTO_INCREMENT NOT NULL, id_turno_trabajo_id INT NOT NULL, id_moneda_id INT NOT NULL, id_factura_id INT DEFAULT NULL, id_cierre_id INT DEFAULT NULL, importe DOUBLE PRECISION NOT NULL, INDEX IDX_F7CB7105B4D9859C (id_turno_trabajo_id), INDEX IDX_F7CB7105374388F5 (id_moneda_id), INDEX IDX_F7CB710555C5F988 (id_factura_id), INDEX IDX_F7CB710545F8C94C (id_cierre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vale_salida_caja_chica (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_cierre_id INT DEFAULT NULL, id_caja_id INT DEFAULT NULL, aceptado TINYINT(1) NOT NULL, nombre_proveedor VARCHAR(255) NOT NULL, importe DOUBLE PRECISION NOT NULL, fecha DATE NOT NULL, file_name VARCHAR(255) DEFAULT NULL, activo TINYINT(1) NOT NULL, nro VARCHAR(255) NOT NULL, anno INT NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, INDEX IDX_E64D25D07EB2C349 (id_usuario_id), INDEX IDX_E64D25D045F8C94C (id_cierre_id), INDEX IDX_E64D25D0F31F1F21 (id_caja_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cierre_caja ADD CONSTRAINT FK_2B6E108179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD CONSTRAINT FK_F7CB7105B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD CONSTRAINT FK_F7CB7105374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD CONSTRAINT FK_F7CB710555C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE cobros_dia_caja_chica ADD CONSTRAINT FK_F7CB710545F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre_caja (id)');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D07EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D045F8C94C FOREIGN KEY (id_cierre_id) REFERENCES cierre_caja (id)');
        $this->addSql('ALTER TABLE vale_salida_caja_chica ADD CONSTRAINT FK_E64D25D0F31F1F21 FOREIGN KEY (id_caja_id) REFERENCES puesto_trabajo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cobros_dia_caja_chica DROP FOREIGN KEY FK_F7CB710545F8C94C');
        $this->addSql('ALTER TABLE vale_salida_caja_chica DROP FOREIGN KEY FK_E64D25D045F8C94C');
        $this->addSql('DROP TABLE cierre_caja');
        $this->addSql('DROP TABLE cobros_dia_caja_chica');
        $this->addSql('DROP TABLE vale_salida_caja_chica');
    }
}
