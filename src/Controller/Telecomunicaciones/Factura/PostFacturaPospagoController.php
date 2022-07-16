<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\Factura;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\FacturaRepository;
use App\Service\Telecomunicaciones\Factura\ListServiciosSolyag;
use App\Service\Telecomunicaciones\Factura\RegisterFacturarServiciosSolyag;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        FacturaRepository $facturaRepository,
        RegisterFacturarServiciosSolyag $RegisterFacturarServiciosSolyag
    ): JsonResponse {

        $no_factura = $facturaRepository->getNextNoFactura();

        $empresa = $request->get("empresa");
        $moneda = $request->get("moneda");
        $periodo_inicio = $request->get("periodo_inicio");
        $periodo_fin = $request->get("periodo_fin");

        $factura = new Factura();
        $factura
            ->setNoFactura($no_factura)
            ->setFecha(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
            ->setMoneda($moneda)
            ->setEmpresa($empresasRepository->find($empresa))
            ->setPeriodoInicio(\DateTime::createFromFormat('Y-m-d', $periodo_inicio))
            ->setPeriodoFin(\DateTime::createFromFormat('Y-m-d', $periodo_fin));

        $em->persist($factura);
        $em->flush();

        ($RegisterFacturarServiciosSolyag)($empresa, $periodo_inicio, $periodo_fin, $factura);

        return $this->json([
            "idfactura" => $factura->getId()
        ]);
        // return $this->render('telecomunicaciones/factura/print.html.twig', [
        //     "idfactur"         => $factura->getId()
        // ]);
    }
}
