<?php

namespace App\Controller\Api;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Service\Telecomunicaciones\LargaDistancia\CreateEmpresaLargaDistanciaRegister;
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
        CreateEmpresaLargaDistanciaRegister $createEmpresaLargaDistanciaRegister
    ): JsonResponse {

        $params = [
            "email" => $request->get('email'),
            "no_telefono" => $request->get('no_telefono'),
            "id_empresa" => $request->get('id_empresa'),
            "no_confirmacion" => $request->get('no_confirmacion'),
            "movimiento_venta" => $request->get('movimiento_venta'),
            "costo" => $request->get('costo')
        ];

        $data = ($createEmpresaLargaDistanciaRegister)($params);

        return $this->json($data);
    }
}
