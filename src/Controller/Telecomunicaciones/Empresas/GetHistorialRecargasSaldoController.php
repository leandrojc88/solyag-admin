<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\HistorialSaldoEmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetHistorialRecargasSaldoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas/historial-recarga-saldo/{empresa}", name="tele-empresas-historial-recarga-saldo")
     */
    public function index(
        HistorialSaldoEmpresaRepository $historialSaldoEmpresaRepository,
        Empresas $empresa
    ): Response {

        $historyEmpresas = $historialSaldoEmpresaRepository->findBy(
            ["empresa" => $empresa],
            ["fecha" => "DESC"]
        );

        return $this->render('telecomunicaciones/empresas/history-recarga-saldo.html.twig', [
            'historyEmpresas' => $historyEmpresas,
            'empresa' => $empresa
        ]);
    }
}
