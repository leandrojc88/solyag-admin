<?php

namespace App\Controller\Telecomunicaciones\Servicios;

use App\Entity\Telecomunicaciones\Servicios;
use App\Repository\Telecomunicaciones\ServiciosRepository;
use App\Service\Telecomunicaciones\Servicios\CreatorServiciosService;
use App\Service\Telecomunicaciones\Servicios\ValidatorServiciosService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostDesactivarServicioController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/post-desactivar-servicio/{servicio}", name="telecomunicaciones-post-desactivar-servicio")
     */
    public function post(
        EntityManagerInterface $em,
        Servicios $servicio
    ) {

        try {

            $servicio->setActivo(!$servicio->getActivo());

            $em->persist($servicio);
            $em->flush();

            $this->addFlash('success', 'Servicio ' . (!$servicio->getActivo() ? 'Activado' : 'Desactivado'));
        } catch (\Throwable $th) {
            $this->addFlash('error', $th->getMessage());
        }

        return $this->redirectToRoute('telecomunicaciones-servicio');
    }
}
