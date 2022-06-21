<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621203420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE empresa_subservicio_cubacel (id INT AUTO_INCREMENT NOT NULL, id_empresa_id INT NOT NULL, id_subservicio_id INT NOT NULL, costo DOUBLE PRECISION DEFAULT NULL, INDEX IDX_E0E16AF1F7949946 (id_empresa_id), INDEX IDX_E0E16AF132C7D54 (id_subservicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_E0E16AF1F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        // $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_E0E16AF132C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        // $this->addSql('DROP TABLE empresa_subservicio_solyag');
        $this->addSql('RENAME TABLE empresa_subservicio_solyag TO empresa_subservicio_cubacel');
        $this->addSql('ALTER TABLE subservicio DROP valor');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE empresa_subservicio_solyag (id INT AUTO_INCREMENT NOT NULL, id_empresa_id INT NOT NULL, id_subservicio_id INT NOT NULL, costo DOUBLE PRECISION DEFAULT NULL, INDEX IDX_3CBD94AD32C7D54 (id_subservicio_id), INDEX IDX_3CBD94ADF7949946 (id_empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        // $this->addSql('ALTER TABLE empresa_subservicio_solyag ADD CONSTRAINT FK_3CBD94AD32C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        // $this->addSql('ALTER TABLE empresa_subservicio_solyag ADD CONSTRAINT FK_3CBD94ADF7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        // $this->addSql('DROP TABLE empresa_subservicio_cubacel');
        $this->addSql('RENAME TABLE empresa_subservicio_cubacel TO empresa_subservicio_solyag');
        $this->addSql('ALTER TABLE subservicio ADD valor INT DEFAULT NULL');
    }
}
