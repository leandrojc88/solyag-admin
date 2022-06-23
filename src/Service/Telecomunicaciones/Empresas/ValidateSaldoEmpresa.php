<?php

namespace App\Service\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Entity\Telecomunicaciones\Subservicio;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use Exception;

class ValidateSaldoEmpresa
{


    private EmpresaTipoPagaRepository $empresaTipoPagaRepository;
    private EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository;

    public function __construct(
        EmpresaTipoPagaRepository $empresaTipoPagaRepository,
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository
    ) {
        $this->empresaTipoPagaRepository = $empresaTipoPagaRepository;
        $this->empresaSubservicioCubacelRepository = $empresaSubservicioCubacelRepository;
    }

    /**
     * Valida si una empresa es de tipo PREPAGO, y si tiene el saldo suficiente para asumir el
     * costo de un subservicio determinado
     */
    public function validate(Empresas $empresa, Subservicio $subservicio)
    {

        $empresaSubservicioCubacel = $this->empresaSubservicioCubacelRepository->findOneBy([
            "id_empresa" => $empresa,
            "id_subservicio" => $subservicio
        ]);

        if (!$empresaSubservicioCubacel)
            throw new Exception("El subservicio " . $subservicio->getDescripcion() . " no tiene un costo configurado para la empresa " . $empresa->getNombre());

        $costoToVerificar = $empresaSubservicioCubacel->getCosto();

        $empresasTipoPago = $this->empresaTipoPagaRepository->findOneBy([
            "empresa" => $empresa
        ]);

        if (!$empresasTipoPago || $empresasTipoPago->getTipo() == EmpresaTipoPaga::POSPAGO) return true;

        return $empresasTipoPago->getSaldo() >= $costoToVerificar;
    }
}
