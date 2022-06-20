<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615145023fixture extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(1, 'Recarga Cubacel', '0010', 'RC', 0);");
        $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(3, 'Larga Distancia', '0030', 'RC', 0);");
        $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(4, 'Envio Familiar', '0040', 'ER', 0);");
        $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(11, 'Paquete Turístico Básico', '0110', 'PTB', 0);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM servicios WHERE id=1');
        $this->addSql('DELETE FROM servicios WHERE id=3');
        $this->addSql('DELETE FROM servicios WHERE id=4');
        $this->addSql('DELETE FROM servicios WHERE id=11');
    }
}
