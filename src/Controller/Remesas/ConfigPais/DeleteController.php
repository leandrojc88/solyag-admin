<?php

namespace App\Controller\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Pais;
use App\Entity\Provincias;
use App\Service\Remesas\ConfigPais\DeleteMunicipio;
use App\Service\Remesas\ConfigPais\DeletePais;
use App\Service\Remesas\ConfigPais\DeleteProvincia;
use App\Service\Remesas\ConfigPais\Http\HttpDeleteZoneToSolyag;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController
{
    /**
     * @Route("/remesas/config-paises/delete/{selectedZone}/{id}", name="remesas-config-paises-delete")
     */
    public function __invoke(
        DeletePais $deletePais,
        DeleteProvincia $deleteProvincia,
        DeleteMunicipio $deleteMunicipio,
        HttpDeleteZoneToSolyag $httpDeleteZoneToSolyag,
        $selectedZone,
        $id
    ): JsonResponse {
        try {

            switch ($selectedZone) {
                case Pais::NAME:
                    $deletePais->__invoke($id);
                    break;

                case Provincias::NAME:
                    $deleteProvincia->__invoke($id);
                    break;

                case Municipios::NAME:
                    $deleteMunicipio->__invoke($id);
                    break;

                default:
                    throw new Exception("La accion de Eliminar no se pudo realizar, contacte al administrador");
            }

            $httpDeleteZoneToSolyag->__invoke($selectedZone, $id);

            return $this->json("$selectedZone eliminado");
        } catch (\Exception $e) {
            return $this->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
