<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714193857 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD nro_tarjeta VARCHAR(255) DEFAULT NULL, DROP nombre_alternativo, DROP primer_apellido_alternativo, DROP segundo_apellido_alternativo, DROP segundo_telefono');
        $this->addSql('ALTER TABLE configuracion_reglas_remesas ADD id_moneda_pais INT NOT NULL');
        $this->addSql('ALTER TABLE moneda_pais ADD valor_conversion DOUBLE PRECISION DEFAULT NULL, CHANGE id_moneda moneda VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiarios_clientes ADD primer_apellido_alternativo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD segundo_apellido_alternativo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD segundo_telefono VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nro_tarjeta nombre_alternativo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE configuracion_reglas_remesas DROP id_moneda_pais');
        $this->addSql('ALTER TABLE moneda_pais DROP valor_conversion, CHANGE moneda id_moneda VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
