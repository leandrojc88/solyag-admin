<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations\migrations;

use App\Controller\CoreMigrations\AbstratCoreMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310202036 extends AbstratCoreMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up() : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE traspaso (id INT AUTO_INCREMENT NOT NULL, id_turno_trabajo_id INT NOT NULL, id_moneda_id INT NOT NULL, id_usuario_acepta_id INT DEFAULT NULL, monto DOUBLE PRECISION NOT NULL, aceptado TINYINT(1) DEFAULT NULL, fecha DATE NOT NULL, INDEX IDX_B0209096B4D9859C (id_turno_trabajo_id), INDEX IDX_B0209096374388F5 (id_moneda_id), INDEX IDX_B02090964F1D00DC (id_usuario_acepta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE traspaso ADD CONSTRAINT FK_B0209096B4D9859C FOREIGN KEY (id_turno_trabajo_id) REFERENCES turno_trabajo (id)');
        $this->addSql('ALTER TABLE traspaso ADD CONSTRAINT FK_B0209096374388F5 FOREIGN KEY (id_moneda_id) REFERENCES moneda (id)');
        $this->addSql('ALTER TABLE traspaso ADD CONSTRAINT FK_B02090964F1D00DC FOREIGN KEY (id_usuario_acepta_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE traspaso');
    }
}
