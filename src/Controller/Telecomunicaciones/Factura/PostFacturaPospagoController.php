<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Repository\Telecomunicaciones\FacturaRepository;
use App\Service\Telecomunicaciones\Factura\ListServiciosSolyag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostFacturaPospagoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/post-facturas-pospago", name="tele_post_facturas_pospago")
     */
    public function index(
        Request $request,
        FacturaRepository $facturaRepository,
        ListServiciosSolyag $listServiciosSolyag
    ): Response {

        $no_factura = $facturaRepository->getNextNoFactura();

        $empresa = $request->get("empresa");
        $periodo_inicio = $request->get("periodo_inicio");
        $periodo_fin = $request->get("periodo_fin");

        $facturasData = ($listServiciosSolyag)($empresa, $periodo_inicio, $periodo_fin);

        return $this->render('telecomunicaciones/factura/print.html.twig', [
            "no_factur"         => $no_factura,
            "serviciosSolyag"   => $facturasData["serviciosSolyag"],
            "total"             => $facturasData["total"],
        ]);
    }
}
