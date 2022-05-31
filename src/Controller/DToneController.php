<?php

namespace App\Controller;

use App\Service\DToneManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * Class DToneController
 * @package App\Controller
 * @Route("/dtone")
 */
class DToneController extends AbstractController
{
    /**
     * @Route("/ejec", name="dtone_index")
     */
    public function index(DToneManager $dToneManager): JsonResponse
    {
        $dToneManager->execTransactions([

            'id_trasaccion' => "345435",
            'last_name' => "Capdesuner",
            'first_name' => "Leandro",
            'mobile_number' => "+5353443584"

        ]);

        return $this->json('telecomunicaciones/index.html.twig');
    }


    /**
     * @Route("/callback_url", name="callback_url", methods={"POST"})
     */
    public function callback_url($response): JsonResponse
    {
        dd($response);
        return $this->json('telecomunicaciones/index.html.twig');
    }
}
