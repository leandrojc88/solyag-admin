<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413154504 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD id_servicio_id INT NOT NULL, CHANGE id_pais_id id_pais_id INT DEFAULT NULL, CHANGE id_provincia_id id_provincia_id INT DEFAULT NULL, CHANGE id_municipio_id id_municipio_id INT DEFAULT NULL, CHANGE segundo_apellido segundo_apellido VARCHAR(255) DEFAULT NULL, CHANGE calle calle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD CONSTRAINT FK_AE9DBD1E69D86E10 FOREIGN KEY (id_servicio_id) REFERENCES servicios (id)');
        $this->addSql('CREATE INDEX IDX_AE9DBD1E69D86E10 ON beneficiarios_clientes (id_servicio_id)');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD id_unidad_id INT DEFAULT NULL, ADD estado TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios ADD CONSTRAINT FK_68EBF91E1D34FA6B FOREIGN KEY (id_unidad_id) REFERENCES unidad (id)');
        $this->addSql('CREATE INDEX IDX_68EBF91E1D34FA6B ON proveedor_unidad_servicios (id_unidad_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiarios_clientes DROP FOREIGN KEY FK_AE9DBD1E69D86E10');
        $this->addSql('DROP INDEX IDX_AE9DBD1E69D86E10 ON beneficiarios_clientes');
        $this->addSql('ALTER TABLE beneficiarios_clientes DROP id_servicio_id, CHANGE id_pais_id id_pais_id INT NOT NULL, CHANGE id_provincia_id id_provincia_id INT NOT NULL, CHANGE id_municipio_id id_municipio_id INT NOT NULL, CHANGE segundo_apellido segundo_apellido VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE calle calle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios DROP FOREIGN KEY FK_68EBF91E1D34FA6B');
        $this->addSql('DROP INDEX IDX_68EBF91E1D34FA6B ON proveedor_unidad_servicios');
        $this->addSql('ALTER TABLE proveedor_unidad_servicios DROP id_unidad_id, DROP estado');
    }
}
