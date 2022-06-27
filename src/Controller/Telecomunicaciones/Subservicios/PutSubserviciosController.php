<?php

namespace App\Controller\Telecomunicaciones\Subservicios;

use App\Entity\Telecomunicaciones\Subservicio;
use App\Service\Telecomunicaciones\Subservicios\HttpUpdateNombreSubservicios;
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
        ValidateSubservicioDescripAndProdctidModify $validate,
        HttpUpdateNombreSubservicios $httpUpdateNombreSubservicios
    ) {

        try {

            $idDTOne = is_null($request->get('isDTOne')) ? false : true;
            ($validate)(
                $id_subservicio->getIdServicio()->getId(),
                $request->get('nombre'),
                $request->get('productid_dtone'),
                $id_subservicio->getId()
            );

            $submited = $id_subservicio->getDescripcion() != $request->get('nombre');

            $id_subservicio->setDescripcion($request->get('nombre'));
            $id_subservicio->setIsDTOne($idDTOne);
            $id_subservicio->setProductidDtone($idDTOne ? $request->get('productid_dtone') : 0);

            $em->persist($id_subservicio);
            $em->flush();

            // actualizar en las empresas
            if ($submited) ($httpUpdateNombreSubservicios)($id_subservicio->getId(), $request->get('nombre'));

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
