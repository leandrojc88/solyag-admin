<?php

namespace App\Controller;

use App\Entity\Pais;
use App\Service\DToneManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
        $response = $dToneManager->execTransactions([

            'id_trasaccion' => "3454353",
            'last_name' => "Capdesuner",
            'first_name' => "Leandro",
            'mobile_number' => "+5353443584"

        ]);

        return $this->json($response);
    }


    /**
     * @Route("/callback_url", name="callback_url", methods={"POST"})
     */
    public function callback_url(EntityManagerInterface $em, Request $request): JsonResponse
    {
        $pais = new Pais();
        $pais->setNombre(json_encode($request->request->all()));
        $pais->setActivo(true);

        $em->persist($pais);
        $em->flush();

        return $this->json('ok!');
    }
}
