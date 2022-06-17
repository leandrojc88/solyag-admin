<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetSubserviciosRecargaController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas-subservicios-recarga-cubacel/{id_empresa}", name="telecomunicaciones-empresas-subservicios-recarga-cubacel")
     */
    public function index(SubservicioRepository $subservicioRepository, Empresas $id_empresa): Response
    {

        $empresas = $subservicioRepository->listSubserviciosEmpresaRecargaCubacel($id_empresa->getId());

        return $this->render('telecomunicaciones/empresas/subservicio-recarga.html.twig', [
            'empresa_name' => $id_empresa->getNombre(),
            'empresas' => $empresas
        ]);
    }
}