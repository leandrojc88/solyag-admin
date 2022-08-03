<?php

namespace App\Service\Remesas\ConfigPais\Http;

use App\Entity\Municipios;
use App\Entity\Provincias;
use App\Repository\EmpresasRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpDeleteZoneToSolyag
{

    // endpint to AdminSolyag
    const DELETE_UPDATE_PAIS = "multi-servicio/remesas/delete-pais";
    const DELETE_UPDATE_PROVINCIA = "multi-servicio/remesas/delete-provincia";
    const DELETE_UPDATE_MUNICIPIO = "multi-servicio/remesas/delete-municipio";


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

    public function __invoke($zoneType, $id)
    {

        $url = self::DELETE_UPDATE_PAIS;

        if ($zoneType == Provincias::NAME) {
            $url = self::DELETE_UPDATE_PROVINCIA;
        }
        if ($zoneType == Municipios::NAME) {
            $url = self::DELETE_UPDATE_MUNICIPIO;
        }

        $empresas = $this->empresasRepo->findBy(["activo" => true]);

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . $url,
            [
                "body" => [
                    "empresas" => array_map(fn ($empresa) => $empresa->getId(), $empresas),
                    "id_api" => $id
                ],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }

    }
}
