<?php

namespace App\Controller\Remesas;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemesasController extends AbstractController
{
    /**
     * @Route("/remesas", name="remesas")
     */
    public function index(): Response
    {
        return $this->render('remesas/index.html.twig', [
            'controller_name' => 'RemesasController',
        ]);
    }
}
