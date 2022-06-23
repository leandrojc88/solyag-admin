<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621210705 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel DROP FOREIGN KEY FK_3CBD94AD32C7D54');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel DROP FOREIGN KEY FK_3CBD94ADF7949946');
        $this->addSql('DROP INDEX idx_3cbd94adf7949946 ON empresa_subservicio_cubacel');
        $this->addSql('CREATE INDEX IDX_E0E16AF1F7949946 ON empresa_subservicio_cubacel (id_empresa_id)');
        $this->addSql('DROP INDEX idx_3cbd94ad32c7d54 ON empresa_subservicio_cubacel');
        $this->addSql('CREATE INDEX IDX_E0E16AF132C7D54 ON empresa_subservicio_cubacel (id_subservicio_id)');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_3CBD94AD32C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_3CBD94ADF7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE empresa_tipo_paga CHANGE saldo saldo DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel DROP FOREIGN KEY FK_E0E16AF1F7949946');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel DROP FOREIGN KEY FK_E0E16AF132C7D54');
        $this->addSql('DROP INDEX idx_e0e16af132c7d54 ON empresa_subservicio_cubacel');
        $this->addSql('CREATE INDEX IDX_3CBD94AD32C7D54 ON empresa_subservicio_cubacel (id_subservicio_id)');
        $this->addSql('DROP INDEX idx_e0e16af1f7949946 ON empresa_subservicio_cubacel');
        $this->addSql('CREATE INDEX IDX_3CBD94ADF7949946 ON empresa_subservicio_cubacel (id_empresa_id)');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_E0E16AF1F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE empresa_subservicio_cubacel ADD CONSTRAINT FK_E0E16AF132C7D54 FOREIGN KEY (id_subservicio_id) REFERENCES subservicio (id)');
        $this->addSql('ALTER TABLE empresa_tipo_paga CHANGE saldo saldo INT NOT NULL');
    }
}
