<?php

namespace App\DataFixtures;

use App\Entity\Telecomunicaciones\Servicios;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiciosFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(1, 'Recarga Cubacel', '0010', 'RC', 0);");
        $servicios1 = new Servicios();
        $servicios1
            ->setId(1)
            ->setNombre('Recarga Cubacel')
            ->setCodigo('0010')
            ->setAbreviatura('RC')
            ->setActivo(false);
        $manager->persist($servicios1);

        // $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(3, 'Larga Distancia', '0030', 'LD', 0);");
        $servicios3 = new Servicios();
        $servicios3
            ->setId(3)
            ->setNombre('Larga Distancia')
            ->setCodigo('0030')
            ->setAbreviatura('LD')
            ->setActivo(false);
        $manager->persist($servicios3);

        // $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(4, 'Envio Familiar', '0040', 'ER', 0);");
        $servicios4 = new Servicios();
        $servicios4
            ->setId(4)
            ->setNombre('Envio Familiar')
            ->setCodigo('0040')
            ->setAbreviatura('ER')
            ->setActivo(false);
        $manager->persist($servicios4);

        // $this->addSql("INSERT INTO `servicios` (`id`, `nombre`, `codigo`, `abreviatura`, `activo`) VALUES(11, 'Paquete Turístico Básico', '0110', 'PTB', 0);");
        $servicios11 = new Servicios();
        $servicios11
            ->setId(11)
            ->setNombre('Paquete Turístico Básico')
            ->setCodigo('0110')
            ->setAbreviatura('PTB')
            ->setActivo(false);
        $manager->persist($servicios11);

        $manager->flush();
    }
}
