<?php

namespace App\Controller\Telecomunicaciones\Servicios;

use App\Repository\Telecomunicaciones\ServiciosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetServiciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/servicio", name="telecomunicaciones-servicio")
     */
    public function index(ServiciosRepository $serviciosRepository)
    {
        // por ahora no es necesario pararlo a un fichero unico

        $servicios = $serviciosRepository->findAll();

        return $this->render('telecomunicaciones/servicios/index.html.twig', [
            'servicios' => $servicios
        ]);
    }
}
