<?php

namespace App\Controller\Remesas\Monedas;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetMonedasController extends AbstractController
{
    /**
     * @Route("/remesas/monedas", name="remesas-monedas")
     */
    public function __invoke(): Response
    {
        return $this->render('remesas/monedas/index.html.twig', [
            'controller_name' => 'RemesasController',
        ]);
    }
}
