<?php

namespace App\Controller\Remesas\ConfigPais;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetListBySelectedConfig extends AbstractController
{
    /**
     * @Route("/remesas/config-paises/get-config-by-selected/{selectedZone}", name="remesas-config-paises-get-config-by-selected")
     */
    public function __invoke($selectedZone): JsonResponse
    {
        return $this->json([
            'hola', 'hola2'
        ]);
    }
}
