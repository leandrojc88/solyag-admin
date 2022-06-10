<?php

namespace App\Service\Telecomunicaciones;

use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use Doctrine\ORM\EntityManagerInterface;

class EmpresaTipoPagoService
{

    const PREPAGO = 'prepago';
    const POSPAGO = 'pospago';

    private EmpresaTipoPagaRepository $empresaTipoPagaRepository;
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em,
        EmpresaTipoPagaRepository $empresaTipoPagaRepository
    ) {
        $this->empresaTipoPagaRepository = $empresaTipoPagaRepository;
        $this->em = $em;
    }

    public function getTipoForCheckBox($tipo)
    {
        return $tipo ? self::PREPAGO : self::POSPAGO;
    }


    public function isHaveSaldo($empresa, $saldo)
    {
        $empresas = $this->empresaTipoPagaRepository->findOneBy([
            "empresa" => $empresa
        ]);

        if ($empresas->getTipo() == self::POSPAGO) return true;

        return $empresas->getSaldo() >= $saldo;
    }


    public function reducirSaldo($empresa, $saldo)
    {

        $empresas = $this->empresaTipoPagaRepository->findOneBy([
            "empresa" => $empresa
        ]);

        if ($empresas->getTipo() == self::POSPAGO) return;

        $empresas->setSaldo($empresas->getSaldo() - $saldo);
        $this->em->persist($empresas);
        $this->em->flush();
    }
}
