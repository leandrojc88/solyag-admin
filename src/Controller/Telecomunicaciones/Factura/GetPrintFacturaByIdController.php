<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\Factura;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\FacturaRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Factura\FormatLargaDistanciaToFacturaData;
use App\Service\Telecomunicaciones\Factura\FormatRecargaCubacelToFacturaData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetPrintFacturaByIdController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/print-facturas-pospago/{factura}", name="tele_get_print_facturas_pospago")
     */
    public function index(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository,
        FormatRecargaCubacelToFacturaData $FormatRecargaCubacelToFacturaData,
        FormatLargaDistanciaToFacturaData $FormatLargaDistanciaToFacturaData,
        Factura $factura
    ): Response {

        $serviciosSolyag = [];
        $total = 0;

        $recargasCubacel = $servicioEmpresaRepository->findBy([
            "factura" => $factura
        ]);

        $largasDistancia = $empresaLargaDistanciaRegisterRepository->findBy([
            "factura" => $factura
        ]);

        if ($recargasCubacel) {
            $return = ($FormatRecargaCubacelToFacturaData)($recargasCubacel);
            array_push($serviciosSolyag, ...$return[0]);
            $total = $return[1];
        }

        if ($largasDistancia) {
            $return = ($FormatLargaDistanciaToFacturaData)($largasDistancia);
            $serviciosSolyag[] = $return[0];
            $total += $return[1];
        }

        return $this->render('telecomunicaciones/factura/print.html.twig', [
            "factura" => $factura,
            "serviciosSolyag" => $serviciosSolyag,
            "total" => $total,
            "qr_url" => $_ENV["SITE_URL"] . $this->generateUrl("tele_get_print_facturas_pospago", [
                "factura" => $factura->getId()
            ])
        ]);
    }
}
