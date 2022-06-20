<?php

namespace App\Controller\Api;

use App\Entity\Empleados;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\ModulosEmpresasRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/servicio-empresa")
 */
class ServicioEmpresaApiController extends AbstractController
{

    /**
     * @Route("/create",name="servicio-empresa-create", methods="POST")
     */
    public function create(
        Request $request,
        ServicioEmpresaService $servicioEmpresaService,
        SubservicioRepository $subservicioRepository
    ): JsonResponse {

        $sub_servicio = $request->get('sub_servicio');
        $id_api = $request->get('id_api');

        // if (!$sub_servicio)
        //     return $this->json("el servicio externo DTOne, no  tiene configurado esta recarga ," . $request->get('id_api'), 500);

        $params = [
            "no_telefono" => $request->get('no_telefono'),
            "id_empresa" => $request->get('id_empresa'),
            "email" => $request->get('email'),
            "id_servicio" =>  $request->get('id_servicio'),
            "sub_servicio" => $sub_servicio,
            "id_api" => $id_api,
            "movimiento_venta" => $request->get('movimiento_venta')
        ];

        $servicioEmpresaService->createServicioEmpresa($params);

        return $this->json('OK');
    }
}
