<?php

namespace App\Controller\Telecomunicaciones\Servicios;

use App\Service\Telecomunicaciones\Servicios\CreatorServiciosService;
use App\Service\Telecomunicaciones\Servicios\ValidatorServiciosService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostServiciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/post-servicio", name="telecomunicaciones-post-servicio")
     */
    public function post(
        Request $request,
        CreatorServiciosService $creatorServiciosService,
        ValidatorServiciosService $validatorServiciosService
    ) {

        try {

            $params = [
                'nombre' => $request->get('nombre'),
                'abreviatura' => $request->get('abreviatura'),
            ];

            $validatorServiciosService->validate($params);

            $creatorServiciosService->create($params);
            $this->addFlash('success', 'servicio creado');

        } catch (\Throwable $th) {
            $this->addFlash('error', $th->getMessage());
        }

        return $this->redirectToRoute('telecomunicaciones-servicio');
    }
}
