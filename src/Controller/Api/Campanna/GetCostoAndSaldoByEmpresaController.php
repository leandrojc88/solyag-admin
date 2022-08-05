<?php

namespace App\Controller\Api\Campanna;

use App\Repository\Campanna\CampannaConfigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetCostoAndSaldoByEmpresaController extends AbstractController
{

    /**
     * @Route("/api/campanna/get-costo-and-saldo-by-empresa")
     */
    public function index(
        Request $request,
        CampannaConfigRepository $campannaConfigRepository
    ): JsonResponse {

        $id_empresa = $request->get('id_empresa');

        $campannaConfig = $campannaConfigRepository->findOneBy(['empresa' => $id_empresa]);

        return $this->json([
            'costo' => $campannaConfig ? $campannaConfig->getCosto() : 0,
            'saldo' => $campannaConfig ? $campannaConfig->getSaldo() : 0
        ]);
    }
}
