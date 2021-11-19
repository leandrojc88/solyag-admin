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
 * @Route("/api/employee")
 */
class EmpleadoApiController extends AbstractController
{

    /**
     * @param string $email email of the employee
     * 
     * @Route("/get-employee-by-email",name="get_employee_by_email", methods="POST")
     */
    public function getEmployeeByEmail(
        Request $request,
        EmpleadosRepository $empleadosRepository,
        EmpresasRepository $empresasRepository
    ): JsonResponse {

        /** @var Empleados $employee */

        $employee = $empleadosRepository->findOneBy(['correo' => $request->get('email')]);
        if ($employee) {

            $modules = $empresasRepository->arrayModules($employee->getIdEmpresa()->getId());

            return $this->json(['employee' => $employee, 'modules' => $modules]);
        }

        return $this->json('Empleado no registrado', 500);
    }

    /**
     * @Route("/create-employee", name="create_employee")
     */
    public function createEmployee(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository
    ): JsonResponse {

        $empledo = new Empleados();
        $empledo
            ->setCorreo($request->get('email'))
            ->setIdEmpresa($empresasRepository->find($request->get('id_empresa')))
            ->setActivo(true)
            ->setAdministrador($request->get('is_admin'))
            ->setNombre($request->get('name'));

        $em->persist($empledo);
        $em->flush();

        return $this->json('datos guardados');
    }
}
