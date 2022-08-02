<?php

namespace App\Controller\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Pais;
use App\Entity\Provincias;
use App\Service\Remesas\ConfigPais\CreateMunicipio;
use App\Service\Remesas\ConfigPais\CreatePais;
use App\Service\Remesas\ConfigPais\CreateProvincia;
use App\Types\Remesas\Zone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class PostCreateController extends AbstractController
{
    /**
     * @Route("/remesas/config-paises/create/{selectedZone}", name="remesas-config-paises-create")
     */
    public function __invoke(
        Request $request,
        CreatePais $createPais,
        CreateProvincia $createProvincia,
        CreateMunicipio $createMunicipio,
        $selectedZone
    ): JsonResponse {
        try {

            $nombre = $request->get('nombre');
            $zone = new Zone();

            switch ($selectedZone) {
                case Pais::NAME:
                    $zone = $createPais->__invoke($nombre);
                    break;

                case Provincias::NAME:
                    $id = $request->get('id');
                    $zone = $createProvincia->__invoke($nombre, $id);
                    break;

                case Municipios::NAME:
                    $id = $request->get('id');
                    $zone = $createMunicipio->__invoke($nombre, $id);
                    break;
            }

            return $this->json($this->serializeRespose($zone));
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), JsonResponse::HTTP_NOT_ACCEPTABLE);
        }
    }

    private function serializeRespose(Zone $zone)
    {
        return [
            'id'        => $zone->getId(),
            'nombre'    => $zone->getNombre(),
            'type'      => $zone->getType()
        ];
    }
}
