<?php

namespace App\Controller\Telecomunicaciones;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TelecomunicacionesController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones", name="telecomunicaciones")
     */
    public function index(): Response
    {

        return $this->render('telecomunicaciones/index.html.twig', [
            'controller_name' => 'TelecomunicacionesController',
        ]);
    }
}