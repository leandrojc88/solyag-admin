<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use Exception;

class ValidateSubservicioDescripAndProdctidModify
{
    private SubservicioRepository $subservicioRepository;

    public function __construct(
        SubservicioRepository $subservicioRepository
    ) {
        $this->subservicioRepository = $subservicioRepository;
    }

    public function __invoke($id_servicio, $descripcion, $productid_dtone, $id_subservicio)
    {
        $finder = $this->subservicioRepository->findBy([
            "id_servicio" => $id_servicio,
            "descripcion" =>  $descripcion
        ]);

        foreach ($finder as $find) {
            if ($find->getId() != $id_subservicio)
                throw new Exception("El subservicio $descripcion ya se encuentra en el servicio seleccionado");
        }

        $finder = $this->subservicioRepository->findBy([
            "id_servicio" => $id_servicio,
            "productid_dtone" =>  $productid_dtone
        ]);

        foreach ($finder as $find) {
            if ($productid_dtone > 0 && $find->getId() != $id_subservicio)
                throw new Exception("El Product id (DTone) = $productid_dtone ya esta en uso");
        }
    }
}
