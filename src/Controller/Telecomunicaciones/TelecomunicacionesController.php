<?php

namespace App\Controller\Telecomunicaciones;

use App\Entity\Telecomunicaciones\Servicios;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\Telecomunicaciones\Servicios\ServicioMethodFactory;
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
        EmpresasRepository $empresasRepository,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        ServicioMethodFactory $servicioMethodFactory
    ): Response {

        $filter = [];

        // fintro de estado
        $se_status = $request->query->get("status");
        if ($se_status) array_push($filter, "status='$se_status'");

        // fintro de fecha
        $start_date = $request->query->get("start_date");
        $end_date = $request->query->get("end_date");
        if ($start_date && $end_date) {
            array_push($filter, "date >= '$start_date'");
            array_push($filter, "date <= '$end_date 23:59:59'");
        }

        // filtro beneficiario
        $beneficiario = $request->query->get("beneficiario");
        if ($beneficiario) array_push($filter, "no_telefono like '%$beneficiario%' ");

        // filtro no orden y/o servicio
        $no_orden = $request->query->get("no_orden");
        if ($no_orden) {
            $result = explode('-', $no_orden);

            $noOrden = "";
            if (count($result) == 2) {
                $servicio = intval($result[0]);
                array_push($filter, "servicio = $servicio ");
                $noOrden = intval($result[1]);
            } else
                $noOrden = intval($result[0]);

            array_push($filter, "no_orden like '%$noOrden%' ");
        }

        // filtro empleado
        $empleado = $request->query->get("empleado");
        if ($empleado) array_push($filter, "empleado like '%$empleado%' ");

        // filtro descripcion
        $descripcion = $request->query->get("descripcion");
        if ($descripcion) array_push($filter, "descripcion like '%$descripcion%' ");

        // filtro empresa
        $empresa = $request->query->get("empresa");
        if ($empresa) array_push($filter, "empresa = $empresa ");

        // filtro servicio
        $servicio = $request->query->get("servicio");
        if ($servicio) array_push($filter, "servicio = $servicio ");


        $query = $servicioEmpresaRepository->getListRecargaCubacel($filter);

        $paginator = $pagination->paginate(
            $query,
            $request->query->getInt('page', 1),
            25,
            ['align' => 'center', 'style' => 'bottom',]
        );

        $recargas = $paginator->getItems();

        $data = [];

        foreach ($recargas as $recarga) {

            $data[] = [
                "id" => $recarga["id"],
                "empresa" => $recarga["empresa"],
                "descripcion" => $recarga["descripcion"],
                "empleado" => $recarga["empleado"],
                "no_orden" => $servicioMethodFactory->getService($recarga["servicio"], $recarga["id"])->noOrdeToStr(),
                "no_telefono" => $recarga["no_telefono"],
                "status" => $recarga["status"],
                "date" => $recarga["date"],
                "confirmation_date" => $recarga["confirmation_date"],
                "servicio" => $recarga["servicio"],
                "servicio_descripcion" => Servicios::getDescriptionByIdServicio($recarga["servicio"]),
                "costo" => $recarga["costo"],
                "id_confir_proveedor" => $recarga["id_confir_proveedor"]
            ];
        }

        $paginator->setItems($data);

        // empresas
        $empresas = $empresasRepository->findBy(["activo" => true]);

        return $this->render('telecomunicaciones/index.html.twig', [
            "recargas" => $paginator,
            "empresas" => $empresas,
            "servicios" => Servicios::getArrayServicio()
        ]);
    }
}
