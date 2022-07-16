<?php

namespace App\Service\Telecomunicaciones\Servicios;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Model\ServiciosSolyag;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use Exception;

class GetCostoServicioSolyag
{

    private EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository;

    public function __construct(
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository
    ) {
        $this->empresaSubservicioCubacelRepository = $empresaSubservicioCubacelRepository;
    }

    public function __invoke(Empresas $empresa, ServiciosSolyag $servicio)
    {

        if ($servicio instanceof ServicioEmpresa) {
            $empresaSub = $this->empresaSubservicioCubacelRepository->findOneBy([
                "id_empresa" => $empresa,
                "id_subservicio" => $servicio->getSubServicio()
            ]);

            return $empresaSub->getCosto();
        }
        if ($servicio instanceof EmpresaLargaDistanciaRegister) {
            return $servicio->getCosto();
        }

        throw new Exception("el servicio no pertenese a los tipos validos ServiciosSolyag ");
    }
}
