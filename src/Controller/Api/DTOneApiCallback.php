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
        // dd(json_decode($request->getContent(), true));
        $em = $this->getDoctrine()->getManager();

        // $result["status"]["message"],

        $pais = new Pais();
        $pais->setResponse(json_decode($request->getContent()));
        $pais->setNombre('respuesta dtone');
        $pais->setActivo(true);

        $em->persist($pais);
        $em->flush();

        return $this->json('ok!');
    }

}
