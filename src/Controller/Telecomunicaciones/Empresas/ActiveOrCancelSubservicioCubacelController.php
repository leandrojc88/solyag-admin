<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Service\Telecomunicaciones\Subservicios\HttpActiveOrNotSubserviciosCubacel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ActiveOrCancelSubservicioCubacelController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/empresa-active-or-cancel-subservicio-cubacel", name="tel-empresa-active-or-cancel-subservicio-cubacel", methods="POST")
     */
    public function index(
        Request $request,
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository,
        EntityManagerInterface $em,
        HttpActiveOrNotSubserviciosCubacel $httpActiveOrNotSubserviciosCubacel
    ) {
        $activo = json_decode($request->get('activo'));
        $id = $request->get('id');

        $empresaCostoCubacel = $empresaSubservicioCubacelRepository->find($id);
        $empresaCostoCubacel->setActivo($activo);

        $em->persist($empresaCostoCubacel);
        $em->flush();

        // enviar el estado de los subservicios a solyag.online

        ($httpActiveOrNotSubserviciosCubacel)(
            $empresaCostoCubacel->getIdEmpresa()->getId(),
            $empresaCostoCubacel->getIdSubservicio()->getId(),
            $activo
        );

        return $this->redirectToRoute(
            'telecomunicaciones-empresas-subservicios-recarga-cubacel',
            ["id_empresa" => $empresaCostoCubacel->getIdEmpresa()->getId()]
        );
    }
}
