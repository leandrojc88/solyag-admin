<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210165025 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bulto (id INT AUTO_INCREMENT NOT NULL, id_manifiesto_id INT DEFAULT NULL, id_unidad_id INT NOT NULL, nro INT NOT NULL, anno INT NOT NULL, fecha DATE NOT NULL, cant_paquetes INT DEFAULT NULL, peso DOUBLE PRECISION DEFAULT NULL, INDEX IDX_AEA271E126D67DCF (id_manifiesto_id), INDEX IDX_AEA271E11D34FA6B (id_unidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manifiesto (id INT AUTO_INCREMENT NOT NULL, id_unidad_id INT NOT NULL, nro INT NOT NULL, anno INT NOT NULL, fecha DATE NOT NULL, cerrado TINYINT(1) NOT NULL, pais_origen VARCHAR(255) NOT NULL, cant_envios INT DEFAULT NULL, peso DOUBLE PRECISION DEFAULT NULL, cant_sacos INT DEFAULT NULL, cancelado TINYINT(1) DEFAULT NULL, INDEX IDX_D15A21961D34FA6B (id_unidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_bulto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, peso_maximo DOUBLE PRECISION DEFAULT NULL, cantidad_paquetes_maxima INT DEFAULT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bulto ADD CONSTRAINT FK_AEA271E126D67DCF FOREIGN KEY (id_manifiesto_id) REFERENCES manifiesto (id)');
        $this->addSql('ALTER TABLE bulto ADD CONSTRAINT FK_AEA271E11D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE manifiesto ADD CONSTRAINT FK_D15A21961D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('ALTER TABLE orden_paquete ADD id_bulto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orden_paquete ADD CONSTRAINT FK_AEE672BB904619EF FOREIGN KEY (id_bulto_id) REFERENCES bulto (id)');
        $this->addSql('CREATE INDEX IDX_AEE672BB904619EF ON orden_paquete (id_bulto_id)');
        $this->addSql('ALTER TABLE paquete ADD id_bulto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paquete ADD CONSTRAINT FK_12686A95904619EF FOREIGN KEY (id_bulto_id) REFERENCES bulto (id)');
        $this->addSql('CREATE INDEX IDX_12686A95904619EF ON paquete (id_bulto_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orden_paquete DROP FOREIGN KEY FK_AEE672BB904619EF');
        $this->addSql('ALTER TABLE paquete DROP FOREIGN KEY FK_12686A95904619EF');
        $this->addSql('ALTER TABLE bulto DROP FOREIGN KEY FK_AEA271E126D67DCF');
        $this->addSql('DROP TABLE bulto');
        $this->addSql('DROP TABLE manifiesto');
        $this->addSql('DROP TABLE tipo_bulto');
        $this->addSql('DROP INDEX IDX_AEE672BB904619EF ON orden_paquete');
        $this->addSql('ALTER TABLE orden_paquete DROP id_bulto_id');
        $this->addSql('DROP INDEX IDX_12686A95904619EF ON paquete');
        $this->addSql('ALTER TABLE paquete DROP id_bulto_id');
    }
}
