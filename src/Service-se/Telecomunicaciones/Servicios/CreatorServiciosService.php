<?php

namespace App\Service\Telecomunicaciones\Servicios;

use App\Entity\Telecomunicaciones\Servicios;
use App\Repository\Telecomunicaciones\ServiciosRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreatorServiciosService
{
    private ServiciosRepository $serviciosRepository;
    private EntityManagerInterface $em;

    public function __construct(
        ServiciosRepository $serviciosRepository,
        EntityManagerInterface $em
    ) {
        $this->serviciosRepository = $serviciosRepository;
        $this->em = $em;
    }

    public function create($params)
    {
        [
            'nombre' => $nombre,
            'abreviatura' => $abreviatura
        ] = $params;

        [$id, $codigo] = $this->generateIdAndCodigo();

        $servicio = new Servicios();

        $servicio
            ->setId($id)
            ->setNombre($nombre)
            ->setActivo(true)
            ->setCodigo($codigo)
            ->setAbreviatura($abreviatura);

        $this->em->persist($servicio);
        $this->em->flush();
    }

    private function generateIdAndCodigo(): array
    {
        $count = $this->serviciosRepository->count([]) + 51;

        $codigo =  $count;
        if ($count < 10)
            $codigo = '00' .  $count . '0';
        if ($count > 9 && $count < 100)
            $codigo = '0' . $count . '0';
        if ($count > 99 &&  $count < 1000)
            $codigo =  $count . '0';

        return [$count, $codigo];
    }
}
