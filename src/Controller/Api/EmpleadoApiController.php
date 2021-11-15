<?php

namespace App\Controller\Api;

use App\Entity\Empleados;
use App\Entity\Empresas;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\ModulosEmpresasRepository;
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
}
