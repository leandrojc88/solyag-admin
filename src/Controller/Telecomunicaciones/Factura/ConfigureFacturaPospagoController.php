<?php

namespace App\Controller\Telecomunicaciones\Factura;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Form\EmpresasType;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\FacturaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfigureFacturaPospagoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/factura/create-facturas-pospago", name="tele_create_facturas_pospago")
     */
    public function index(
        EmpresasRepository $empresasRepository,
        FacturaRepository $facturaRepository
    ): Response {

        $no_factura = $facturaRepository->getNextNoFactura();
        // dd(FacturaRepository::noFacturaToStr($no_factura));
        // empresas
        // $empresas = $empresasRepository->findBy(["activo" => true]);
        $empresasQuery = $empresasRepository->listEmpresa();

        $empresas = [];

        foreach ($empresasQuery as $empresa) {
            if ($empresa["tipo"] == EmpresaTipoPaga::POSPAGO) {
                $empresas[] = $empresa;
            }
        }

        return $this->render('telecomunicaciones/factura/create-view.html.twig', [
            "empresas" => $empresas,
            "no_factura" => FacturaRepository::noFacturaToStr($no_factura)
        ]);
    }
}
