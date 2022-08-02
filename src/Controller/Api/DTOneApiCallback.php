<?php

namespace App\Controller\Api;

use App\Entity\Pais;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\DTOne\UpdateDTOneApiForServiceEmpresa;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DTOneApiCallback extends AbstractController
{


    /**
     * @Route("/api/dtone-callback-url", name="dtone_callback_url", methods={"POST"})
     */
    public function callback_url(
        Request $request,
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa
    ): JsonResponse {

        $result = json_decode($request->getContent(), true);
        $recarga = $servicioEmpresaRepository->find($result["external_id"]);
        if (!$recarga) {
            $id = substr($result["external_id"], 0, -1);
            $recarga = $servicioEmpresaRepository->find($id);
        }

        ($updateDTOneApiForServiceEmpresa)(
            $recarga->getId(),
            $result["id"],
            $result["confirmation_date"],
            $result["status"]["message"],
            $result
        );

        // actualizar en solyag.online la recarga como movimiento de servicio
        $data = $servicioEmpresaService->prepareDataToSolyagApp([], $recarga);
        $httpPostServicioEmpresaCubacel->update($data);

        return $this->json('ok!');
    }
}
