<?php

namespace App\Controller;

use App\Service\Telecomunicaciones\Config\GetLoadIsActiveService;
use App\Service\Telecomunicaciones\DTOne\ExecTransactionForDeclined;
use App\Service\Telecomunicaciones\DTOne\ExecTransactionForInit;
use App\Service\Telecomunicaciones\DTOne\ExecTransactionForManual;
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
        GetLoadIsActiveService $getLoadIsActiveService,
        ExecTransactionForInit $execTransactionForInit,
        ExecTransactionForDeclined $execTransactionForDeclined,
        ExecTransactionForManual $execTransactionForManual
    ): JsonResponse {

        if (!$getLoadIsActiveService->get())
            return $this->json(["finish" => true, "msg" => "API DTone esta desactivada por el sistema"]);

        $execTransactionForInit->__invoke();
        $execTransactionForDeclined->__invoke();
        $execTransactionForManual->__invoke();


        return $this->json(["finish" => true]);
    }
}
