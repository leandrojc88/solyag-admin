<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpUpdateCostoscSubserviciosCubacel
{

    // endpint to AdminSolyag
    const POST_SUBSERVICIO_CUBACEL = "servicios/post-subservicios-cubacel";


    // http methods
    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->API_URL = $_ENV['SITE_SOLYAG'] . "/api/";
        $this->client = $client;
    }

    public function __invoke($id_empresa, $id_api, $descripcion, $costo)
    {

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . self::POST_SUBSERVICIO_CUBACEL,
            [
                "body" => [
                    "id_empresa" => $id_empresa,
                    "id_api" => $id_api,
                    "descripcion" => $descripcion,
                    "costo" => $costo
                ],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }
    }
}
