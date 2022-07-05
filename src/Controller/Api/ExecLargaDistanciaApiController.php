<?php

namespace App\Controller\Api;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Service\Telecomunicaciones\LargaDistancia\CreateEmpresaLargaDistanciaRegister;
use App\Service\Telecomunicaciones\LargaDistancia\ExecutorLargaDistancia;
use App\Service\Telecomunicaciones\LargaDistancia\SoapLargaDistancia;
use App\Types\ResponseLargaDistancia;
use App\Types\Status;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExecLargaDistanciaApiController extends AbstractController
{

    /**
     * @Route("/api/telecomunicaciones/exec-larga-distancia",name="tele-exec-larga-distancia", methods="POST")
     */
    public function create(
        Request $request,
        CreateEmpresaLargaDistanciaRegister $createEmpresaLargaDistanciaRegister,
        ExecutorLargaDistancia $executorLargaDistancia
    ): JsonResponse {

        $params = [
            "email" => $request->get('email'),
            "no_telefono" => $request->get('no_telefono'),
            "id_empresa" => $request->get('id_empresa'),
            "movimiento_venta" => $request->get('movimiento_venta'),
            "costo" => $request->get('costo'),
            "precio" => $request->get('precio')
        ];

        /** @var EmpresaLargaDistanciaRegister $empresaLargaDistanciaRegiter */
        $empresaLargaDistanciaRegiter = ($createEmpresaLargaDistanciaRegister)($params);

        ($executorLargaDistancia)(
            $empresaLargaDistanciaRegiter,
            $request->get('precio'),
            $request->get('no_telefono')
        );

        return $this->json([
            "no_orden" => $empresaLargaDistanciaRegiter->noOrdeToStr(),
            "status" => $empresaLargaDistanciaRegiter->getStatus()
        ]);
    }
}
