<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Repository\Telecomunicaciones\FacturaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostFacturaPospagoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/post-facturas-pospago", name="tele_post_facturas_pospago")
     */
    public function index(FacturaRepository $facturaRepository): Response
    {
        $facturas = $facturaRepository->findAll();

        return $this->render('telecomunicaciones/factura/get_facturas_pospago/index.html.twig', [
            "facturas" => $facturas
        ]);
    }
}