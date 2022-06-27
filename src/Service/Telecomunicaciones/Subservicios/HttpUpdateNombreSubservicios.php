<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Entity\Empresas;
use App\Repository\EmpresasRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpUpdateNombreSubservicios
{

    // endpint to AdminSolyag
    const PUT_NOMBRE_SUBSERVICIO = "servicios/put-nombre-subservicios";


    // http methods
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";

    private HttpClientInterface $client;
    private EmpresasRepository $empresasRepo;

    public function __construct(
        HttpClientInterface $client,
        EmpresasRepository $empresasRepo
    ) {
        $this->API_URL = $_ENV['SITE_SOLYAG'] . "/api/";
        $this->client = $client;
        $this->empresasRepo = $empresasRepo;
    }

    public function __invoke($id_api, $nombre)
    {

        $empresas = $this->empresasRepo->findBy(["activo" => true]);

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . self::PUT_NOMBRE_SUBSERVICIO,
            [
                "body" => [
                    "empresas" => array_map( fn($empresa) => $empresa->getId() , $empresas),
                    "id_api" => $id_api,
                    "nombre" => $nombre,
                ],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }
    }
}
