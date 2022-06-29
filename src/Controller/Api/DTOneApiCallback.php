<?php

namespace App\Controller\Api;

use App\Entity\Pais;
use App\Service\DToneManager;
use Doctrine\ORM\EntityManagerInterface;
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
        DToneManager $dToneManager
    ): JsonResponse {

        $result = json_decode($request->getContent(), true);

        $dToneManager->updateDToneIntoServiceEmpresa(
            $result["external_id"],
            $result["id"],
            $result["confirmation_date"],
            $result["status"]["message"],
            $result
        );

        return $this->json('ok!');
    }
}
