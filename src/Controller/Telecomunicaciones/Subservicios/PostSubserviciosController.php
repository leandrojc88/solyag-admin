<?php

namespace App\Controller\Telecomunicaciones\Subservicios;

use App\Service\Telecomunicaciones\Subservicios\CreatorSubserviciosService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostSubserviciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/post-subservicios", name="telecomunicaciones-post-subservicios")
     */
    public function post(
        Request $request,
        CreatorSubserviciosService $creatorSubserviciosService
    ) {

        try {

            $params = [
                'nombre' => $request->get('nombre'),
                'id_servicio' => $request->get('id_servicio'),
                'productid_dtone' => $request->get('productid_dtone'),
            ];

            $creatorSubserviciosService->create($params);
            $this->addFlash('success', 'subservicio creado');
        } catch (\Throwable $th) {
            $this->addFlash('error', $th->getMessage());
        }

        return $this->redirectToRoute(
            'telecomunicaciones-subservicios',
            ["id_servicio" => $request->get('id_servicio')]
        );
    }
}
