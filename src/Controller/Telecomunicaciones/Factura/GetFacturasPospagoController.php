<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Entity\Telecomunicaciones\Factura;
use App\Repository\EmpresasRepository;
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
        EmpresasRepository $empresasRepository,
        CalcImporteFactura $CalcImporteFactura
    ): Response {

        $filter = [];

        // no factura
        $no_factura = $request->query->get("no_factura");
        if ($no_factura) array_push($filter, "f.no_factura like '%$no_factura%' ");

        // filtro fecha
        $fecha = $request->query->get("fecha");
        if ($fecha) {
            // dd($fecha);
            array_push($filter, "f.periodo_inicio <= '$fecha' ");
            array_push($filter, "f.periodo_fin >= '$fecha' ");
        }

        // filtro empresa
        $empresa = $request->query->get("empresa");
        if ($empresa) {
            array_push($filter, "f.empresa = $empresa ");
        }

        $facturasSql = $facturaRepository->search($filter);

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

        $empresas = [];
        $empresasQuery = $empresasRepository->listEmpresa();

        foreach ($empresasQuery as $empresa) {
            if ($empresa["tipo"] == EmpresaTipoPaga::POSPAGO) {
                $empresas[] = $empresa;
            }
        }

        return $this->render('telecomunicaciones/factura/get_facturas_pospago/index.html.twig', [
            "facturas" => $paginator,
            "empresas" => $empresas
        ]);
    }
}
