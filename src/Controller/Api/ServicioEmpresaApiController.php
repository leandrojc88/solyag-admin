<?php

namespace App\Controller\Api;

use App\Entity\Empleados;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\ModulosEmpresasRepository;
use App\Service\Telecomunicaciones\ServicioEmpresaService;
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
        ServicioEmpresaService $servicioEmpresaService
    ): JsonResponse {

        $params = [
            "no_telefono" => $request->get('no_telefono'),
            "id_empresa" => $request->get('id_empresa'),
            "email" => $request->get('email'),
            "id_servicio" => $request->get('id_servicio')
        ];

        $servicioEmpresaService->createServicioEmpresa($params);

        return $this->json('OK');
    }

}
