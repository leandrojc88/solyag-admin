<?php

namespace App\Controller\Telecomunicaciones\RecargaCubacelManual;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PutDoneRecargaCubacelManual extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/recarga-cubacel-manual-done/{id_empresa}/{recarga}",
     *      name="tele-recarga-cubacel-manual-done", methods="POST")
     */
    public function index(
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        EntityManagerInterface $em,
        $id_empresa,
        ServicioEmpresa $recarga
    ): Response {

        $recarga->setStatus(Status::COMPLETED);

        $em->persist($recarga);
        $em->flush();

        // actualizar en solyag.online la recarga como movimiento de servicio
        $data = $servicioEmpresaService->prepareDataToSolyagApp([], $recarga);

        $httpPostServicioEmpresaCubacel->update($data);

        return $this->redirectToRoute(
            'tele-recarga-cubacel-manual-id',
            ["id_empresa" => $id_empresa]
        );
    }
}
