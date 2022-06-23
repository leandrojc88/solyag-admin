<?php

namespace App\Service\Telecomunicaciones\Subservicios;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use Exception;

class ValidateSubservicioDescripAndProdctid
{
    private SubservicioRepository $subservicioRepository;

    public function __construct(
        SubservicioRepository $subservicioRepository
    ) {
        $this->subservicioRepository = $subservicioRepository;
    }

    public function __invoke($id_servicio, $descripcion, $productid_dtone)
    {
        if ($this->subservicioRepository->findBy([
            "id_servicio" => $id_servicio,
            "descripcion" =>  $descripcion
        ]))
            throw new Exception("El subservicio $descripcion ya se encuentra en el servicio seleccionado");

        if ($productid_dtone > 0 && $this->subservicioRepository->findBy([
            "id_servicio" => $id_servicio,
            "productid_dtone" =>  $productid_dtone
        ]))
            throw new Exception("El Product id (DTone) = $productid_dtone ya esta en uso");
    }
}
