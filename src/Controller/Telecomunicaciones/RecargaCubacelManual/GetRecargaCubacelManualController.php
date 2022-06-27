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
        PaginatorInterface $pagination
    ): Response {
        $empresas = $empresasRepository->findBy(["activo" => true]);

        return $this->render('telecomunicaciones\recatga-cubacel-manual\index.html.twig', [
            "empresas" => $empresas,
            "select_empresa" => 0,
            "recargas" => $pagination->paginate(
                array_reverse([]),
                $request->query->getInt('page', 1),
                25,
                ['align' => 'center', 'style' => 'bottom']
            )
        ]);
    }
    /**
     * @Route("/{id_empresa}", name="tele-recarga-cubacel-manual-id")
     */
    public function findEmpresa(
        Request $request,
        EmpresasRepository $empresasRepository,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        PaginatorInterface $pagination,
        Empresas $id_empresa
    ): Response {

        $empresas = $empresasRepository->findBy(["activo" => true]);

        /*
        "id" => Ramsey\Uuid\Lazy\LazyUuidFromString {#889 ▶}
        "no_telefono" => "+5354525142"
        "status" => "CONFIRMED"
        "date" => DateTime @1654829711 {#893 ▶}
        "no_orden" => 18
        "descripcion" => "250"
        "costo" => 250.0 */
        $recargas = $servicioEmpresaRepository->getRecargaCubacelManual($id_empresa);

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
            "select_empresa" => $id_empresa->getId(),
            "recargas" => $paginator
        ]);
    }
}
