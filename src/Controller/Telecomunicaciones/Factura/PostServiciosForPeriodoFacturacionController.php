<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Service\Telecomunicaciones\Factura\ListServiciosSolyag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostServiciosForPeriodoFacturacionController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/post-servicios-perido-facturacion", name="tele_post_servicios_perido_facturacion")
     */
    public function index(
        Request $request,
        ListServiciosSolyag $listServiciosSolyag
    ): JsonResponse {

        $empresa = $request->get("empresa");
        $periodo_inicio = $request->get("periodo_inicio");
        $periodo_fin = $request->get("periodo_fin");

        $facturasData = ($listServiciosSolyag)($empresa, $periodo_inicio, $periodo_fin);

        return $this->json([
            "serviciosSolyag" => $facturasData["serviciosSolyag"],
            "total"           => $facturasData["total"],
        ]);
    }
}
