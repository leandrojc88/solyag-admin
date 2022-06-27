<?php

namespace App\Controller\Telecomunicaciones;

use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\RecargaCubacel\ListRecargaCubacel;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TelecomunicacionesController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones", name="telecomunicaciones")
     */
    public function index(
        Request $request,
        PaginatorInterface $pagination,
        ListRecargaCubacel $listRecargaCubacel,
        ServicioEmpresaRepository $servicioEmpresaRepository
    ): Response {
        // listado
        $list = ($listRecargaCubacel)([]);

        $data = [];
        foreach ($list as $recarga) {

            $empresaServicio = $servicioEmpresaRepository->find($recarga["id"]);

            $data[] = [
                "id" => $recarga["id"],
                "empresa" => $recarga["empresa"],
                "descripcion" => $recarga["descripcion"],
                "empleado" => $recarga["empleado"],
                "no_orden" => $empresaServicio->noOrdeToStr(),
                "no_telefono" => $recarga["no_telefono"],
                "status" => $recarga["status"],
                "date" => $recarga["date"],
                "confirmation_date" => $recarga["confirmation_date"],
                "servicio" => $recarga["servicio"],
                "costo" => $recarga["costo"]
            ];
        }

        $paginator = $pagination->paginate(
            array_reverse($data),
            $request->query->getInt('page', 1),
            25,
            ['align' => 'center', 'style' => 'bottom',]
        );

        return $this->render('telecomunicaciones/index.html.twig', [
            "recargas" => $paginator
        ]);
    }
}
