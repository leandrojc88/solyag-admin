<?php

namespace App\Controller;

use App\Entity\Pais;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Status;
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
            'last_name' => "Capdesuner", // beneficiario
            'first_name' => "Leandro", // beneficiario
            'mobile_number' => "+5353443584"

        ]);

        return $this->json($response);
    }

    /**
     * @Route("/looptask", name="looptask")
     */
    public function looptask(ServicioEmpresaRepository $servicioEmpresaRepository, DToneManager $dToneManager): JsonResponse
    {

        $serviciosInit = $servicioEmpresaRepository->findBy(["status" => Status::INIT]);

        foreach ($serviciosInit as $key => $item) {
            /** @var ServicioEmpresa $item */

            $response = $dToneManager->execTransactions([

                'id_trasaccion' => $item->getId(),
                'last_name' => "SOLYAG",
                'first_name' => "SOLYAG",
                'mobile_number' => $item->getNoTelefono()

            ]);

            // if (array_key_exists("error", $response)) {
            //     return $response;
            // }

            // $item->setStatus();
        }

        return $this->json(["finish" => true]);
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
