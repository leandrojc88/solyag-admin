<?php

namespace App\Controller\Api;

use App\Entity\Empleados;
use App\Entity\EmpresaCierre;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresaCierreRepository;
use App\Repository\EmpresasRepository;
use App\Repository\ModulosEmpresasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/empresa")
 */
class EmpresaApiController extends AbstractController
{

    /**
     * @param int $empresa_id id of the selected empresa
     *
     * @Route("/get-data",name="get_empresa_data", methods="POST")
     */
    public function getEmpresaData(
        Request $request,
        EmpresasRepository $empresasRepository
    ): JsonResponse {

        /** @var Empleados $employee */
        $empresa = $empresasRepository->find($request->get('empresa'));

        if ($empresa) {

            if (!$empresa->getReady())
                return $this->json('Su empresa no tiene el servicio disponible', 501);

            return $this->json($empresa);
        }
        return $this->json('Empresa no existe!', 502);
    }

    /**
     * @Route("/manage-empresa-cierre",name="manage_empresa_cierre", methods={"POST"})
     */
    public function manageEmpresaCierre(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpresaCierreRepository $empresaCierreRepository
    ): JsonResponse {

        $idEmpresa = $request->get('idEmpresa');
        $idAgencia = $request->get('idAgencia');
        $cierre = $request->get('cierre');

        $empresa =  $empresasRepository->find($idEmpresa);

        if (!$empresa) return  $this->json('no existe la empresa', 402);

        /** @var EmpresaCierre $empresaCierre */
        $empresaCierre = $empresaCierreRepository->findOneBy([
            'idAgencia' => $idAgencia, 'empresa' => $empresa
        ]);

        if ($cierre == "true" || $cierre == true) {

            if (!$empresaCierre) {
                $empresaCierre = new EmpresaCierre();
                $empresaCierre->setEmpresa($empresa);
                $empresaCierre->setIdAgencia($idAgencia);
                $empresaCierre->setCierre($cierre);

                $em->persist($empresaCierre);
                $em->flush();
            }
        } else {

            if ($empresaCierre) {
                $em->remove($empresaCierre);
                $em->flush();
            }
        }


        return $this->json('ok!');
    }


    /**
     * @Route("/manage-empresa-cierre", name="get_manage_empresa_cierre", methods={"GET"})
     */
    public function getAllEmpresaCierre(
        EmpresaCierreRepository $empresaCierreRepository
    ): JsonResponse {

        /** @var EmpresaCierre[] $empresaCierre */
        $empresaCierre = $empresaCierreRepository->findBy([], ['empresa' => 'ASC', 'idAgencia' => 'ASC']);

        $data = [];

        foreach ($empresaCierre as $value) {

            $data[] = [
                "idEmpresa" => $value->getEmpresa()->getId(),
                "idAgencia" => $value->getIdAgencia()
            ];
        }
        return $this->json($data);
    }
}
