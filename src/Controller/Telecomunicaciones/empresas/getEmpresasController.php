<?php

namespace App\Controller\Telecomunicaciones\empresas;

use App\Repository\EmpresasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class getEmpresasController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas", name="telecomunicaciones-empresas")
     */
    public function index(EmpresasRepository $empresasRepository): Response
    {

        $empresas = $empresasRepository->listEmpresa();

        return $this->render('telecomunicaciones/empresas/index.html.twig', [
            'controller_name' => 'TelecomunicacionesController',
            'empresas' => $empresas
        ]);
    }
}
