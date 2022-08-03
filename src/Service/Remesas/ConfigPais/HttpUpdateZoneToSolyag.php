<?php

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Provincias;
use App\Repository\EmpresasRepository;
use App\Types\Remesas\Zone;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpUpdateZoneToSolyag
{

    // endpint to AdminSolyag
    const POST_UPDATE_PAIS = "multi-servicio/remesas/post-pais";
    const POST_UPDATE_PROVINCIA = "multi-servicio/remesas/post-provincia";
    const POST_UPDATE_MUNICIPIO = "multi-servicio/remesas/post-municipio";


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

    public function __invoke(Zone $zone)
    {

        $url = self::POST_UPDATE_PAIS;

        if ($zone instanceof Provincias) {
            $url = self::POST_UPDATE_PROVINCIA;
        }
        if ($zone instanceof Municipios) {
            $url = self::POST_UPDATE_MUNICIPIO;
        }

        $empresas = $this->empresasRepo->findBy(["activo" => true]);

        $data_api = $this->client->request(
            self::POST,
            $this->API_URL . $url,
            [
                "body" => [
                    "empresas" => array_map( fn($empresa) => $empresa->getId() , $empresas),
                    "id_api" => $zone->getId(),
                    "descripcion" => $zone->getNombre(),
                    "id_parent" => $zone->getIdParent()
                ],
                'verify_peer' => false
            ]
        );

        if ($data_api->getStatusCode() != 200) {
            throw new \Exception('Error de Sistema, contacte al administrador' . $data_api->getContent(false));
        }
    }
}
