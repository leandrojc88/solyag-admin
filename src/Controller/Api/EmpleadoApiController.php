<?php

namespace App\Controller\Api;

use App\Repository\EmpleadosRepository;
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
        EmpleadosRepository $empleadosRepository
    ): JsonResponse {
        $employee = $empleadosRepository->findBy(['correo' => $request->get('email')]);

        if ($employee)
            return $this->json($employee);

        return $this->json('Empleado no registrado', 500);
    }
}
