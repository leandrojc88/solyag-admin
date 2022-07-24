<?php

namespace App\Controller\Campanna\Empresa;

use App\Repository\EmpresasRepository;
use App\Service\Campanna\Empresa\AutoCreateEmpresaCampannaConfig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetConfigController extends AbstractController
{
    /**
     * @Route("/campanna/config-empresas", name="campanna-config-empresas")
     */
    public function index(
        AutoCreateEmpresaCampannaConfig $autoCreateEmpresaCampannaConfig,
        EmpresasRepository $empresasRepository
    ): Response {

        $autoCreateEmpresaCampannaConfig->__invoke();

        $empresas = $empresasRepository->listEmpresaConfigCampannaSms();

        return $this->render('campanna/empresa/index.html.twig', [
            "empresas" => $empresas
        ]);
    }
}
