<?php

namespace App\Controller\Remesas\ConfigRegla;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetConfigReglaController extends AbstractController
{
    /**
     * @Route("/remesas/config-reglas", name="remesas-config-reglas")
     */
    public function __invoke(): Response
    {
        return $this->render('remesas/config-reglas/index.html.twig', [
            'controller_name' => 'RemesasController',
        ]);
    }
}
