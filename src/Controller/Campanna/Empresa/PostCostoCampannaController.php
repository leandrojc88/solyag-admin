<?php

namespace App\Controller\Campanna\Empresa;

use App\Entity\Campanna\CampannaConfig;
use App\Repository\Campanna\CampannaConfigRepository;
use App\Repository\EmpresasRepository;
use App\Service\Campanna\Empresa\AutoCreateEmpresaCampannaConfig;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostCostoCampannaController extends AbstractController
{
    /**
     * @Route("/campanna/post-costo-campanna-sms", name="campanna-post-costo-campanna-sms")
     */
    public function index(
        Request $request,
        EntityManagerInterface $em,
        CampannaConfigRepository $campannaConfigRepository
    ): Response {

        $id_empresa = $request->get('id_empresa');
        $costo = $request->get('costo');

        $campannaConfig = $campannaConfigRepository->findOneBy([
            "empresa" => $id_empresa
        ]);

        $campannaConfig->setCosto($costo);

        $em->persist($campannaConfig);
        $em->flush();

        $this->addFlash('success', 'Costo de la Campaña sms Actualizado ');
        return $this->redirectToRoute('campanna-config-empresas');
    }
}
