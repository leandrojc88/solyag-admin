<?php

namespace App\Controller\Remesas\ConfigPais;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllConfigPaisesController extends AbstractController
{
    /**
     * @Route("/remesas/config-paises", name="remesas-config-paises")
     */
    public function __invoke(): Response
    {
        return $this->render('remesas/config-pais/index.html.twig', [
            'controller_name' => 'RemesasController',
        ]);
    }
}
