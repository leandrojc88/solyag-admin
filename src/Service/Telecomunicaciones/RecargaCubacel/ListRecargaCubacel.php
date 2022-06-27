<?php

namespace App\Service\Telecomunicaciones\RecargaCubacel;

use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Knp\Component\Pager\PaginatorInterface;

class ListRecargaCubacel
{

    private ServicioEmpresaRepository $servicioEmpresaRepository;
    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository
    ) {

        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
    }


    public function __invoke($filtros)
    {
        $recargas = $this->servicioEmpresaRepository->getListRecargaCubacel($filtros);

        return $recargas;
    }
}
