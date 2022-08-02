<?php

namespace App\Controller\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Pais;
use App\Entity\Provincias;
use App\Repository\PaisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllConfigPaisesController extends AbstractController
{
    /**
     * @Route("/remesas/config-paises", name="remesas-config-paises")
     */
    public function __invoke(
        PaisRepository $paisRepository
    ): Response {
        $data = $paisRepository->findAll();
        $paises = [];
        foreach ($data as $value) {
            $paises[] = [
                'id' => $value->getId(),
                'name' => $value->getNombre(),
                'type' => $value->getType(),
            ];
        }
        return $this->render(
            'remesas/config-pais/index.html.twig',
            [
                'data' =>  [
                    ["nombre" => 'Paises', "type" => Pais::NAME, "items" => $paises],
                    ["nombre" => 'Provicincias', "type" => Provincias::NAME, "items" => []],
                    ["nombre" => 'Municipios', "type" => Municipios::NAME, "items" => []]
                ]
            ]
        );
    }
}
