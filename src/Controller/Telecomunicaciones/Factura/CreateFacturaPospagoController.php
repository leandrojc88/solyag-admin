<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\FacturaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateFacturaPospagoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/create-facturas-pospago", name="tele_create_facturas_pospago")
     */
    public function index(
        EmpresasRepository $empresasRepository
    ): Response {

        // empresas
        $empresas = $empresasRepository->findBy(["activo" => true]);

        return $this->render('telecomunicaciones/factura/create-view.html.twig', [
            "empresas" => $empresas
        ]);
    }
}
