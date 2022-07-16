<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\Factura;
use App\Repository\Telecomunicaciones\FacturaRepository;
use App\Service\Telecomunicaciones\Factura\CalcImporteFactura;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetFacturasPospagoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/get-facturas-pospago", name="tele_get_facturas_pospago")
     */
    public function index(
        FacturaRepository $facturaRepository,
        Request $request,
        PaginatorInterface $pagination,
        CalcImporteFactura $CalcImporteFactura
    ): Response {

        $facturasSql = $facturaRepository->findAll();

        $paginator = $pagination->paginate(
            $facturasSql,
            $request->query->getInt('page', 1),
            25,
            ['align' => 'center', 'style' => 'bottom',]
        );

        $facturas = $paginator->getItems();

        $data = [];

        foreach ($facturas as $factura) {
            /** @var Factura $factura */
            $data[] = [
                "id"                => $factura->getId(),
                "no_factura"        => $factura->getNoFactura(),
                "getNoFacturaStr"   => $factura->getNoFacturaStr(),
                "fecha"             => $factura->getFecha(),
                "moneda"            => $factura->getMoneda(),
                "empresa"           => $factura->getEmpresa(),
                "periodo_inicio"    => $factura->getPeriodoInicio(),
                "periodo_fin"       => $factura->getPeriodoFin(),
                "importe"           => ($CalcImporteFactura)($factura)
            ];
        }

        $paginator->setItems($data);

        return $this->render('telecomunicaciones/factura/get_facturas_pospago/index.html.twig', [
            "facturas" => $paginator
        ]);
    }
}
