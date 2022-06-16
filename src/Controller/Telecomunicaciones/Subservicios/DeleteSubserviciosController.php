<?php

namespace App\Controller\Telecomunicaciones\Subservicios;

use App\Service\Telecomunicaciones\Subservicios\CreatorSubserviciosService;
use App\Service\Telecomunicaciones\Subservicios\RemoveSubserviciosService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeleteSubserviciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/delete-subservicios/{id_subservicio}", name="telecomunicaciones-delete-subservicios")
     */
    public function post(
        Request $request,
        RemoveSubserviciosService $removeSubserviciosService,
        $id_subservicio
    ) {

        try {

            $removeSubserviciosService->delete($id_subservicio);
            $this->addFlash('success', 'subservicio eliminado');
        } catch (\Throwable $th) {
            $this->addFlash('error', $th->getMessage());
        }

        return $this->redirectToRoute(
            'telecomunicaciones-subservicios',
            ["id_servicio" => $request->get('id_servicio')]
        );
    }
}
