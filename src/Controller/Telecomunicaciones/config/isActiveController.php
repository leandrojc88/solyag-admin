<?php

namespace App\Controller\Telecomunicaciones\config;

use App\Service\Telecomunicaciones\config\getLoadIsActiveService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class isActiveController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/config/load-is-active")
     */
    public function index(getLoadIsActiveService $getLoadIsActiveService): JsonResponse
    {
        return $this->json(['active' => $getLoadIsActiveService->get()]);
    }
}