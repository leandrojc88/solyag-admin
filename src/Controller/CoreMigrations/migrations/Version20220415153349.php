<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415153349 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sessions');
        $this->addSql('ALTER TABLE factura ADD json_servicios LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE movimiento_servicio ADD id_subservicio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movimiento_servicio ADD CONSTRAINT FK_93FD19C332C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        $this->addSql('CREATE INDEX IDX_93FD19C332C7D54 ON movimiento_servicio (id_subservicio_id)');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion ADD id_factura_id INT DEFAULT NULL, CHANGE id_cotizacion_id id_cotizacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion ADD CONSTRAINT FK_4A1D3ED255C5F988 FOREIGN KEY (id_factura_id) REFERENCES factura (id)');
        $this->addSql('CREATE INDEX IDX_4A1D3ED255C5F988 ON plazos_pago_cotizacion (id_factura_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sessions (sess_id VARBINARY(128) NOT NULL, sess_data BLOB NOT NULL, sess_lifetime INT UNSIGNED NOT NULL, sess_time INT UNSIGNED NOT NULL, PRIMARY KEY(sess_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE factura DROP json_servicios');
        $this->addSql('ALTER TABLE movimiento_servicio DROP FOREIGN KEY FK_93FD19C332C7D54');
        $this->addSql('DROP INDEX IDX_93FD19C332C7D54 ON movimiento_servicio');
        $this->addSql('ALTER TABLE movimiento_servicio DROP id_subservicio_id');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion DROP FOREIGN KEY FK_4A1D3ED255C5F988');
        $this->addSql('DROP INDEX IDX_4A1D3ED255C5F988 ON plazos_pago_cotizacion');
        $this->addSql('ALTER TABLE plazos_pago_cotizacion DROP id_factura_id, CHANGE id_cotizacion_id id_cotizacion_id INT NOT NULL');
    }
}
