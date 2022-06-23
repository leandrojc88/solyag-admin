<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpActiveOrNotSubserviciosCubacel
{

    // endpint to AdminSolyag
    const PUT_ACTIVE_OR_NOT_SUBSERVICIO_CUBACEL = "servicios/put-active-or-not-subservicios-cubacel";


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

    public function __invoke($id_empresa, $id_api, $activo)
    {

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . self::PUT_ACTIVE_OR_NOT_SUBSERVICIO_CUBACEL,
            [
                "body" => [
                    "id_empresa" => $id_empresa,
                    "id_api" => $id_api,
                    "activo" => $activo
                ],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }
    }
}
