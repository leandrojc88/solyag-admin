<?php

namespace App\Controller\Api;

use App\Entity\Pais;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DTOneApiCallback extends AbstractController
{


    /**
     * @Route("/api/dtone-callback-url", name="dtone_callback_url", methods={"POST"})
     */
    public function callback_url(Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        $pais = new Pais();
        $pais->setNombre(json_encode($request->request->all()));
        // $pais->setNombre('123');
        $pais->setActivo(true);

        $em->persist($pais);
        $em->flush();

        return $this->json('ok!');
    }

}
