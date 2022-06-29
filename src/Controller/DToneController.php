<?php

namespace App\Controller;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Config\GetLoadIsActiveService;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Service\Telecomunicaciones\Empresas\ValidateSaldoEmpresa;
use App\Types\Status;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DToneController
 * @package App\Controller
 * @Route("/dtone")
 */
class DToneController extends AbstractController
{
    /**
     * @Route("/looptask", name="looptask")
     */
    public function looptask(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        GetLoadIsActiveService $getLoadIsActiveService
    ): JsonResponse {

        if (!$getLoadIsActiveService->get())
            return $this->json(["finish" => true, "msg" => "API DTone esta desactivada por el sistema"]);

        $serviciosInit = $servicioEmpresaRepository->findBy([
            "status" => Status::INIT,
        ]);

        /*
        [ id_empresa,
        servicios = [
                [ movimiento_venta, no_orden, status ], ...
            ]
        ]
        */
        $listServicios = [];

        foreach ($serviciosInit as $key => $item) {
            /** @var ServicioEmpresa $item */

            if (!$item->getSubServicio()->getIsDTOne()) continue;

            $dToneManager->execTransactions([

                'id_trasaccion' => $item->getId(),
                'last_name' => "SOLYAG",
                'first_name' => "SOLYAG",
                'mobile_number' => $item->getNoTelefono(),
                'product_id' => $item->getSubServicio()->getProductidDtone()

            ]);

            $listServicios = $servicioEmpresaService->prepareDataToSolyagApp($listServicios, $item);
        }
        if ($listServicios)
            $httpPostServicioEmpresaCubacel->update($listServicios);

        return $this->json(["finish" => true]);
    }

}
