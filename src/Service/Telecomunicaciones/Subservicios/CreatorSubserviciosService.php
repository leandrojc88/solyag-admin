<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Entity\Telecomunicaciones\Servicios;
use App\Entity\Telecomunicaciones\Subservicio;
use Doctrine\ORM\EntityManagerInterface;

class CreatorSubserviciosService
{

    private EntityManagerInterface $em;
    private ValidateSubservicioDescripAndProdctid $validate;

    public function __construct(
        EntityManagerInterface $em,
        ValidateSubservicioDescripAndProdctid $validate
    ) {
        $this->em = $em;
        $this->validate = $validate;
    }

    public function create($params)
    {
        [
            'nombre' => $nombre,
            'id_servicio' => $id_servicio,
            'productid_dtone' => $productid_dtone,
            'valor' => $valor,
        ] = $params;

        ($this->validate)($id_servicio,  $nombre, $productid_dtone);

        $subservicio = new Subservicio();

        $subservicio
            ->setDescripcion($nombre)
            ->setProductIdDtone($productid_dtone)
            ->setValor($valor)
            ->setActivo(true)
            ->setIdServicio($this->em->getRepository(Servicios::class)->find($id_servicio));

        $this->em->persist($subservicio);
        $this->em->flush();
    }
}
