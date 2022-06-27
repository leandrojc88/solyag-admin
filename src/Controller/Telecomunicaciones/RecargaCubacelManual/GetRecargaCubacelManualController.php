<?php

namespace App\Controller\Telecomunicaciones\RecargaCubacelManual;

use App\Entity\Empresas;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/telecomunicaciones/recarga-cubacel-manual")
 */
class GetRecargaCubacelManualController extends AbstractController
{

    /**
     * @Route("/", name="tele-recarga-cubacel-manual")
     */
    public function index(
        Request $request,
        EmpresasRepository $empresasRepository,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        PaginatorInterface $pagination
    ): Response {
        $empresas = $empresasRepository->findBy(["activo" => true]);

        $recargas = $servicioEmpresaRepository->getRecargaCubacelManual();

        $data = [];
        foreach ($recargas as $recarga) {

            $empresaServicio = $servicioEmpresaRepository->find($recarga["id"]);

            $data[] = [
                "id" => $recarga["id"],
                "no_telefono" => $recarga["no_telefono"],
                "status" => $recarga["status"],
                "date" => $recarga["date"],
                "no_orden" => $empresaServicio->noOrdeToStr(),
                "descripcion" => $recarga["descripcion"],
                "costo" => $recarga["costo"],
                "empresa" => $recarga["empresa"]
            ];
        }

        $paginator = $pagination->paginate(
            array_reverse($data),
            $request->query->getInt('page', 1),
            25,
            ['align' => 'center', 'style' => 'bottom',]
        );


        return $this->render('telecomunicaciones\recatga-cubacel-manual\index.html.twig', [
            "empresas" => $empresas,
            "select_empresa" => 0,
            "recargas" => $paginator
        ]);
    }
}
