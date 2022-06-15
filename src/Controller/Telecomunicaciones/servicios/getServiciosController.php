<?php

namespace App\Controller\Telecomunicaciones\Servicios;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetServiciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/servicio", name="telecomunicaciones-servicio")
     */
    public function index()
    {
        return $this->render('telecomunicaciones/servicios/index.html.twig', []);
    }
}
