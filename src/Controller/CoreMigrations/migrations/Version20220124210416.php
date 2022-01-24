<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124210416 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('UPDATE cuenta SET nombre = "Efectivo en Caja en RD$" WHERE id=1;');
        $this->addSql('UPDATE cuenta SET nombre = "Efectivo en Banco en RD$" WHERE id=2;');
        $this->addSql('UPDATE cuenta SET nombre = "Capital Contable en RD$" WHERE id=54;');
        $this->addSql('INSERT INTO `cuenta` (`id`, `id_tipo_cuenta_id`, `nro_cuenta`, `nombre`, `deudora`, `mixta`, `obligacion_deudora`, `obligacion_acreedora`, `activo`, `produccion`) VALUES (112, 1, 480, "Gastos acumulados por pagar", 0, 0, 0, 0, 1, 0);');
        $this->addSql('INSERT INTO `cuenta_criterio_analisis` (`id`, `id_cuenta_id`, `id_criterio_analisis_id`, `orden`) VALUES (172, 112, 6, 1);');
        $this->addSql('INSERT INTO `subcuenta` (`id`, `id_cuenta_id`, `nro_subcuenta`, `elemento_gasto`, `descripcion`, `deudora`, `activo`) VALUES (275, 112, "0010", 0, "Gastos acumulados por pagar", 0, 1);');
        
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gastos_pagar');
    }
}
