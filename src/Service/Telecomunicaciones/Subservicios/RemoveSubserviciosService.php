<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class RemoveSubserviciosService
{

    private EntityManagerInterface $em;
    private SubservicioRepository $subservicioRepository;

    public function __construct(
        EntityManagerInterface $em,
        SubservicioRepository $subservicioRepository
    ) {
        $this->em = $em;
        $this->subservicioRepository = $subservicioRepository;
    }

    public function delete($id_subservicio)
    {
        $subservicio = $this->subservicioRepository->find($id_subservicio);

        if (!$subservicio)
            throw new Exception("EL subservicio seleccionado no existe");

        $this->em->remove($subservicio);
        $this->em->flush();
    }
}
