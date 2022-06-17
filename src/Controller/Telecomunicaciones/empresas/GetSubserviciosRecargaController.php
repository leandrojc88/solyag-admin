<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Repository\EmpresasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetSubserviciosRecargaController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas-subservicios-recarga", name="telecomunicaciones-empresas-subservicios-recarga")
     */
    public function index(EmpresasRepository $empresasRepository): Response
    {

        $empresas = $empresasRepository->listEmpresa();

        return $this->render('telecomunicaciones/empresas/subservicio-recarga.html.twig', [
            'empresas' => $empresas
        ]);
    }
}