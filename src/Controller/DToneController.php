<?php

namespace App\Controller;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Config\GetLoadIsActiveService;
use App\Service\Telecomunicaciones\DTOne\ExecTransactionForDeclined;
use App\Service\Telecomunicaciones\DTOne\ExecTransactionForInit;
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
        GetLoadIsActiveService $getLoadIsActiveService,
        ExecTransactionForInit $execTransactionForInit,
        ExecTransactionForDeclined $execTransactionForDeclined
    ): JsonResponse {

        if (!$getLoadIsActiveService->get())
            return $this->json(["finish" => true, "msg" => "API DTone esta desactivada por el sistema"]);

        ($execTransactionForInit)();
        ($execTransactionForDeclined)();


        return $this->json(["finish" => true]);
    }
}
