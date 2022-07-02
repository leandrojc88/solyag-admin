<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Repository\EmpresasRepository;
use App\Service\Telecomunicaciones\Empresas\AutoCreateEmpresaTipoPago;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetEmpresasController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas", name="telecomunicaciones-empresas")
     */
    public function index(
        EmpresasRepository $empresasRepository,
        AutoCreateEmpresaTipoPago $autoCreateEmpresaTipoPago
    ): Response {

        ($autoCreateEmpresaTipoPago)();

        $empresas = $empresasRepository->listEmpresa();

        return $this->render('telecomunicaciones/empresas/index.html.twig', [
            'empresas' => $empresas
        ]);
    }
}
