<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\HistorialSaldoEmpresa;
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

        $historyEmpresas = $historialSaldoEmpresaRepository->listSubmayor($empresa->getId());

        $saldo = 0;

        foreach ($historyEmpresas as &$value) {

            if ($value["tipo"] == HistorialSaldoEmpresa::AGREGAR) {
                $saldo += $value["valor"];
                $value["saldo"] = $saldo;
            } else {
                $saldo -= $value["valor"];
                $value["saldo"] = $saldo;
            }
        }

        return $this->render('telecomunicaciones/empresas/history-recarga-saldo.html.twig', [
            'historyEmpresas' => $historyEmpresas,
            'empresa' => $empresa
        ]);
    }
}
