<?php

namespace App\Controller\Telecomunicaciones\servicios;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class getServiciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/servicio", name="telecomunicaciones-servicio")
     */
    public function index()
    {
        return $this->render('telecomunicaciones/servicios/index.html.twig', []);
    }
}
