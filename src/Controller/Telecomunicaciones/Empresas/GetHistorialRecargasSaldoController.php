<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\HistorialSaldoEmpresa;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\HistorialSaldoEmpresaRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetHistorialRecargasSaldoController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresas/historial-recarga-saldo/{empresa}", name="tele-empresas-historial-recarga-saldo")
     */
    public function index(
        HistorialSaldoEmpresaRepository $historialSaldoEmpresaRepository,
        Request $request,
        PaginatorInterface $pagination,
        Empresas $empresa
    ): Response {

        $filter = [];

        // filtro descripcion
        $descripcion = $request->query->get("descripcion");
        if ($descripcion) array_push($filter, "descripcion like '%$descripcion%' ");

        // fintro de fecha
        $start_date = $request->query->get("start_date");
        $end_date = $request->query->get("end_date");
        if ($start_date && $end_date) {
            array_push($filter, "fecha >= '$start_date'");
            array_push($filter, "fecha <= '$end_date 23:59:59'");
        }

        $query = $historialSaldoEmpresaRepository->listSubmayor($empresa->getId(),  $filter);

        $paginator = $pagination->paginate(
            $query,
            $request->query->getInt('page', 1),
            25,
            ['align' => 'center', 'style' => 'bottom',]
        );

        return $this->render('telecomunicaciones/empresas/history-recarga-saldo.html.twig', [
            'historyEmpresas' => $paginator,
            'empresa' => $empresa
        ]);
    }
}
