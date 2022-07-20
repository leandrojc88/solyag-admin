<?php

namespace App\Controller\Telecomunicaciones\RecargaCubacelManual;

use App\Entity\Telecomunicaciones\RecargasCubacelManualToDTOne;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PutRecargaCubacelManualToDTOneController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/recargas-cubacel-manual-to-dtone",
     *      name="tele-recargas-cubacel-manual-to-dtone", methods="POST")
     */
    public function index(
        Request $request,
        EntityManagerInterface $em,
        ServicioEmpresaRepository $servicioEmpresaRepository
    ): Response {

        $recargas = $servicioEmpresaRepository->getRecargaCubacelManual();
        $productid_dtone = $request->get('productid_dtone');

        foreach ($recargas as $recarga) {
            $recargaCubacel = $servicioEmpresaRepository->find($recarga["id"]);
            $recargaToDTOne = new RecargasCubacelManualToDTOne();

            $recargaToDTOne
                ->setRecarga($recargaCubacel)
                ->setProductidDtone($productid_dtone)
                ->setDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
                ->setStatus(Status::MANUAL_DTONE);

            $recargaCubacel->setStatus(Status::MANUAL_DTONE);

            $em->persist($recargaCubacel);
            $em->persist($recargaToDTOne);
        }

        $em->flush();

        return $this->redirectToRoute('tele-recarga-cubacel-manual');
    }
}
