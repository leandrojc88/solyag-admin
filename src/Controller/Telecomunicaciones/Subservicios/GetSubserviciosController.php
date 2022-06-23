<?php

namespace App\Controller\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\ServiciosRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetSubserviciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/subservicios/{id_servicio}", name="telecomunicaciones-subservicios")
     */
    public function index(SubservicioRepository $subservicioRepository, $id_servicio)
    {
        // por ahora no es necesario pararlo a un fichero unico

        $subservicios = $subservicioRepository->findBy(['id_servicio' => $id_servicio]);

        // dd($subservicios);

        return $this->render('telecomunicaciones/subservicios/index.html.twig', [
            'subservicios' => $subservicios
        ]);
    }
}