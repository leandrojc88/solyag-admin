<?php

namespace App\Controller\Api;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Service\Telecomunicaciones\RecargaCubacel\NotifyEmailManualRecarga;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NotifyFromEmailApiController extends AbstractController
{

    /**
     * @Route("/api/telecomunicaciones/notify-from-email")
     */
    public function index(
        Request $request,
        NotifyEmailManualRecarga $notifyEmailManualRecarga
    ): JsonResponse {

        $id_empresa = $request->get('id_empresa');

        ($notifyEmailManualRecarga)($id_empresa);

        return $this->json(true);
    }
}
