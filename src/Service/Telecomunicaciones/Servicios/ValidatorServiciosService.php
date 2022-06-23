<?php

namespace App\Service\Telecomunicaciones\Servicios;

use App\Repository\Telecomunicaciones\ServiciosRepository;
use Exception;

final class ValidatorServiciosService
{
    private ServiciosRepository $serviciosRepository;

    public function __construct(
        ServiciosRepository $serviciosRepository
    ) {
        $this->serviciosRepository = $serviciosRepository;
    }

    public function validate($params)
    {
        [
            'nombre' => $nombre,
            'abreviatura' => $abreviatura
        ] = $params;

        if ($this->serviciosRepository->findBy(['nombre' => $nombre]))
            throw new Exception("El nombre del servicio ya se encuentra registrado");

        if ($this->serviciosRepository->findBy(['abreviatura' => $abreviatura]))
            throw new Exception("La abreviatura del servicio ya se encuentra registrada");
    }
}
