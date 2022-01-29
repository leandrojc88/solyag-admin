<?php

namespace App\Controller\Api;

use App\Entity\Empleados;
use App\Repository\EmpleadosRepository;
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
}
