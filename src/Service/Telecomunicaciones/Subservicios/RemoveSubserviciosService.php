<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\EmpresaSubservicioSolyagRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class RemoveSubserviciosService
{

    private EntityManagerInterface $em;
    private SubservicioRepository $subservicioRepository;
    private EmpresaSubservicioSolyagRepository $empresaSubservicioSolyagRepository;

    public function __construct(
        EntityManagerInterface $em,
        SubservicioRepository $subservicioRepository,
        EmpresaSubservicioSolyagRepository $empresaSubservicioSolyagRepository
    ) {
        $this->em = $em;
        $this->subservicioRepository = $subservicioRepository;
        $this->empresaSubservicioSolyagRepository = $empresaSubservicioSolyagRepository;
    }

    public function delete($id_subservicio)
    {
        $subservicio = $this->subservicioRepository->find($id_subservicio);

        if (!$subservicio)
            throw new Exception("EL subservicio seleccionado no existe");

        $subservicioCostoSolyag = $this->empresaSubservicioSolyagRepository->findBy(["id_subservicio" => $id_subservicio]);

        if ($subservicioCostoSolyag)
            throw new Exception("EL subservicio seleccionado esta asociado a los cosatos de algunas empresas, no se puede ser eliminado");


        $this->em->remove($subservicio);
        $this->em->flush();
    }
}
