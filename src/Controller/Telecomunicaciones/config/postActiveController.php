<?php

namespace App\Controller\Telecomunicaciones\config;

use App\Service\Telecomunicaciones\config\modifyActiveService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class postActiveController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/config/dtone-is-active", name="dtone-active-is-actives")
     */
    public function activese(
        Request $request,
        modifyActiveService $modifyActiveService
    ): JsonResponse {

        $active = filter_var($request->get('active'), FILTER_VALIDATE_BOOL) ;

        $modifyActiveService->update($active);

        return $this->json(['active' => $active]);
    }
}
