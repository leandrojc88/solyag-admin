<?php

namespace App\Tests\Controller\Telecomunicaciones\Servicios;

use App\Entity\Telecomunicaciones\Servicios;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiciosTest extends WebTestCase
{
    public function test_should_by_get_servicio_recargas(): void
    {
        $client = static::createClient();
        // the service container is always available via the test client
        $recarga = $client->getContainer()->get('doctrine')->getRepository(Servicios::class)->find(Servicios::ID_RECARGA_CUBACEL);

        $recargaCubacel = new Servicios();
        $recargaCubacel
            ->setId(Servicios::ID_RECARGA_CUBACEL)
            ->setNombre('Recarga Cubacel')
            ->setCodigo('0010')
            ->setAbreviatura('RC')
            ->setActivo(false);

        $this->assertEquals($recarga, $recargaCubacel);
    }

    public function test_should_by_get_servicio_larga_distancia(): void
    {
        $client = static::createClient();
        // the service container is always available via the test client
        $recarga = $client->getContainer()->get('doctrine')->getRepository(Servicios::class)->find(Servicios::ID_LARGA_DISTANCIA);

        $servicioDB = new Servicios();
        $servicioDB
            ->setId(Servicios::ID_LARGA_DISTANCIA)
            ->setNombre('Larga Distancia')
            ->setCodigo('0030')
            ->setAbreviatura('LD')
            ->setActivo(false);

        $this->assertEquals($recarga, $servicioDB);
    }

    public function test_should_by_get_servicio_Envio_Familiar(): void
    {
        $client = static::createClient();
        // the service container is always available via the test client
        $recarga = $client->getContainer()->get('doctrine')->getRepository(Servicios::class)->find(4);

        $servicioDB = new Servicios();
        $servicioDB
            ->setId(4)
            ->setNombre('Envio Familiar')
            ->setCodigo('0040')
            ->setAbreviatura('ER')
            ->setActivo(false);

        $this->assertEquals($recarga, $servicioDB);
    }
}
