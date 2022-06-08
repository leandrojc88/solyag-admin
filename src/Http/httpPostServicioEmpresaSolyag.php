<?php

namespace App\Http;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class httpPostServicioEmpresaSolyag
{

    // endpint to AdminSolyag
    const PUT_SERVICIO_EMPRESA = "servicio-empresa/update-movimiento-servicio";


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

    public function updateServicioEmpresaInSolyag($data)
    {

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . self::PUT_SERVICIO_EMPRESA,
            [
                "body" => ["data" =>  $data],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }
    }
}
