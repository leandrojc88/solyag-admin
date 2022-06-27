<?php

namespace App\Controller\Telecomunicaciones\RecargaCubacelManual;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PutDoneRecargaCubacelManual extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/recarga-cubacel-manual-done/{recarga}",
     *      name="tele-recarga-cubacel-manual-done", methods="POST")
     */
    public function index(
        Request $request,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        EntityManagerInterface $em,
        ServicioEmpresa $recarga
    ): Response {

        $numnero_confirmacion = $request->get('numero_confirmacion');

        $recarga
            ->setStatus(Status::COMPLETED)
            ->setIdConfirProveedor($numnero_confirmacion)
            ->setConfirmationDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')));

        $em->persist($recarga);
        $em->flush();

        // actualizar en solyag.online la recarga como movimiento de servicio
        $data = $servicioEmpresaService->prepareDataToSolyagApp([], $recarga);

        $httpPostServicioEmpresaCubacel->update($data);

        return $this->redirectToRoute('tele-recarga-cubacel-manual');
    }
}
