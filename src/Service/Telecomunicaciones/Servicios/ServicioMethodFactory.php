<?php

namespace App\Service\Telecomunicaciones\Servicios;

use App\Entity\Telecomunicaciones\Servicios;
use App\Model\ServiciosSolyag;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Exception;

class ServicioMethodFactory
{

    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresaLargaDistanciaRegisterRepository $empresaLargaDistanciaRegisterRepository
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->empresaLargaDistanciaRegisterRepository = $empresaLargaDistanciaRegisterRepository;
    }

    public function getService($idServicio, $id): ServiciosSolyag
    {

        switch ($idServicio) {
            case Servicios::ID_RECARGA_CUBACEL:
                return $this->servicioEmpresaRepository->find($id);

            case Servicios::ID_LARGA_DISTANCIA:
                return $this->empresaLargaDistanciaRegisterRepository->find($id);
        }

        throw new Exception("No se encontro el objeto del servicio " . $idServicio);
    }
}
