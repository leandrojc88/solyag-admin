<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Entity\Telecomunicaciones\Servicios;
use App\Entity\Telecomunicaciones\Subservicio;
use Doctrine\ORM\EntityManagerInterface;

class CreatorSubserviciosService
{

    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function create($params)
    {
        [
            'nombre' => $nombre,
            'id_servicio' => $id_servicio
        ] = $params;

        $subservicio = new Subservicio();

        $subservicio
            ->setDescripcion($nombre)
            ->setActivo(true)
            ->setIdServicio($this->em->getRepository(Servicios::class)->find($id_servicio));

        $this->em->persist($subservicio);
        $this->em->flush();
    }
}
