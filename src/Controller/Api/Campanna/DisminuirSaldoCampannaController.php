<?php

namespace App\Controller\Api\Campanna;

use App\Repository\Campanna\CampannaConfigRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DisminuirSaldoCampannaController extends AbstractController
{

    /**
     * @Route("/api/campanna/disminuir-saldo-campanna")
     */
    public function index(
        Request $request,
        CampannaConfigRepository $campannaConfigRepository,
        EntityManagerInterface $em
    ): JsonResponse {

        $id_empresa      = $request->get('id_empresa');
        $saldo_disminuir = $request->get('saldo_disminuir');

        $campannaConfig = $campannaConfigRepository->findOneBy(['empresa' => $id_empresa]);
        $campannaConfig->setSaldo($campannaConfig->getSaldo() - $saldo_disminuir);

        $em->persist($campannaConfig);
        $em->flush();

        return $this->json(['ok']);
    }
}
