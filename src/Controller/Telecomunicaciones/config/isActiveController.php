<?php

namespace App\Controller\Telecomunicaciones\Config;

use App\Service\Telecomunicaciones\Config\GetLoadIsActiveService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IsActiveController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/config/load-is-active")
     */
    public function index(GetLoadIsActiveService $getLoadIsActiveService): JsonResponse
    {
        return $this->json(['active' => $getLoadIsActiveService->get()]);
    }
}