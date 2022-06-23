<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class RemoveSubserviciosService
{

    private EntityManagerInterface $em;
    private SubservicioRepository $subservicioRepository;
    private EmpresaSubservicioCubacelRepository $EmpresaSubservicioCubacelRepository;

    public function __construct(
        EntityManagerInterface $em,
        SubservicioRepository $subservicioRepository,
        EmpresaSubservicioCubacelRepository $EmpresaSubservicioCubacelRepository
    ) {
        $this->em = $em;
        $this->subservicioRepository = $subservicioRepository;
        $this->EmpresaSubservicioCubacelRepository = $EmpresaSubservicioCubacelRepository;
    }

    public function delete($id_subservicio)
    {
        $subservicio = $this->subservicioRepository->find($id_subservicio);

        if (!$subservicio)
            throw new Exception("EL subservicio seleccionado no existe");

        $subservicioCostoSolyag = $this->EmpresaSubservicioCubacelRepository->findBy(["id_subservicio" => $id_subservicio]);

        if ($subservicioCostoSolyag)
            throw new Exception("EL subservicio seleccionado esta asociado a los cosatos de algunas empresas, no se puede ser eliminado");


        $this->em->remove($subservicio);
        $this->em->flush();
    }
}
