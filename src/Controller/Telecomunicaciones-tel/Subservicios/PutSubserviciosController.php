<?php

namespace App\Controller\Telecomunicaciones\Subservicios;

use App\Entity\Telecomunicaciones\Subservicio;
use App\Service\Telecomunicaciones\Subservicios\ValidateSubservicioDescripAndProdctidModify;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PutSubserviciosController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/put-subservicios/{id_subservicio}", name="telecomunicaciones-put-subservicios")
     */
    public function put(
        Request $request,
        EntityManagerInterface $em,
        Subservicio $id_subservicio,
        ValidateSubservicioDescripAndProdctidModify $validate
    ) {

        try {

            ($validate)(
                $id_subservicio->getIdServicio()->getId(),
                $request->get('nombre'),
                $request->get('productid_dtone'),
                $id_subservicio->getId()
            );

            $id_subservicio->setDescripcion($request->get('nombre'));
            $id_subservicio->setValor($request->get('valor'));
            $id_subservicio->setProductidDtone($request->get('productid_dtone'));

            $em->persist($id_subservicio);
            $em->flush();

            $this->addFlash('success', 'subservicio creado');
        } catch (\Throwable $th) {
            $this->addFlash('error', $th->getMessage());
        }

        return $this->redirectToRoute(
            'telecomunicaciones-subservicios',
            ["id_servicio" => $request->get('id_servicio')]
        );
    }
}
