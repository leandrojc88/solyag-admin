<?php

namespace App\Service\Telecomunicaciones\LargaDistancia;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpUpdateCostoLargaDistancia
{

    // endpint to AdminSolyag
    const POST_COSTO_LARGA_DISTANCIA = "servicios/post-costo-larga-distancia";


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

    public function __invoke($id_empresa, $costo)
    {

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . self::POST_COSTO_LARGA_DISTANCIA,
            [
                "body" => [
                    "id_empresa" => $id_empresa,
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
