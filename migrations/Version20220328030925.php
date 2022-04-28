<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:migrations/Version20210601191111.php
final class Version20210601191111 extends AbstractMigration
=======
final class Version20220328030925 extends AbstractMigration
>>>>>>> 33814addb73adfe120303e64952f3ac6cc153bec:migrations/Version20220328030925.php
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD:migrations/Version20210601191111.php
        $this->addSql('ALTER TABLE modulos CHANGE id id INT NOT NULL');
=======
        $this->addSql('CREATE TABLE empresa_cierre (id INT AUTO_INCREMENT NOT NULL, empresa_id INT DEFAULT NULL, id_agencia INT NOT NULL, cierre TINYINT(1) NOT NULL, INDEX IDX_443C1C5E521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empresa_cierre ADD CONSTRAINT FK_443C1C5E521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
>>>>>>> 33814addb73adfe120303e64952f3ac6cc153bec:migrations/Version20220328030925.php
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<< HEAD:migrations/Version20210601191111.php
        $this->addSql('ALTER TABLE modulos CHANGE id id INT AUTO_INCREMENT NOT NULL');
=======
        $this->addSql('DROP TABLE empresa_cierre');
>>>>>>> 33814addb73adfe120303e64952f3ac6cc153bec:migrations/Version20220328030925.php
    }
}
