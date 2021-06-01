<?php

namespace App\Controller;

use App\Entity\Empleados;
use App\Entity\Empresas;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EmpleadosController
 * @package App\Controller
 * @Route("/empleados")
 */
class EmpleadosController extends AbstractController
{
    /**
     * @Route("/", name="empleados")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $empresas = $em->getRepository(Empresas::class)->findBy(['activo' => true]);
        $empleados = $em->getRepository(Empleados::class)->findBy(['activo' => true]);
        $row = [];
        /** @var Empresas $item */
        foreach ($empresas as $item) {
            $rows_empleados = [];
            /** @var Empleados $element */
            foreach ($empleados as $element) {
                if ($element->getIdEmpresa() == $item)
                    $rows_empleados [] = [
                        'nombre' => $element->getNombre(),
                        'correo' => $element->getCorreo()
                    ];
            }
            if (!empty($rows_empleados)) {
                $str_cantidad = ' ( 1 empleado )';
                if (count($rows_empleados) > 1)
                    $str_cantidad = ' ( '.count($rows_empleados) .' empleados )';
                $row[] = [
                    'empleados' => $rows_empleados,
                    'nombre_empresa' => $item->getNombre() . $str_cantidad
                ];
            }
        }
        return $this->render('empleados/index.html.twig', [
            'controller_name' => 'EmpleadosController',
            'data' => $row
        ]);
    }
}
