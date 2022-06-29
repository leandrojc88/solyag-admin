<?php

namespace App\Controller\Api;

use App\Entity\Pais;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
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
        ServicioEmpresaRepository $servicioEmpresaRepository
    ): JsonResponse {

        $result = json_decode($request->getContent(), true);

        $dToneManager->updateDToneIntoServiceEmpresa(
            $result["external_id"],
            $result["id"],
            $result["confirmation_date"],
            $result["status"]["message"],
            $result
        );

        // borrar cuando crea q este bien
        $pais = new Pais();
        $pais->setResponse($result);
        $pais->setNombre('respuesta dtone');
        $pais->setActivo(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($pais);
        $em->flush();


        // actualizar en solyag.online la recarga como movimiento de servicio
        $recarga = $servicioEmpresaRepository->find($result["external_id"]);
        if ($recarga) {
            $data = $servicioEmpresaService->prepareDataToSolyagApp([], $recarga);
            $httpPostServicioEmpresaCubacel->update($data);
        }

        return $this->json('ok!');
    }
}
