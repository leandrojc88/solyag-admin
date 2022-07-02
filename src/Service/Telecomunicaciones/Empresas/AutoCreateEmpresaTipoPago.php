<?php

namespace App\Service\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use Doctrine\ORM\EntityManagerInterface;

class AutoCreateEmpresaTipoPago
{

    private EntityManagerInterface $em;
    private EmpresasRepository $empresasRepository;

    public function __construct(
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository
    ) {
        $this->em = $em;
        $this->empresasRepository = $empresasRepository;
    }

    public function __invoke()
    {

        $empresasSinTipoPaga = $this->empresasRepository->empresasSinTipoPago();

        // dd($empresasSinTipoPaga);
        foreach ($empresasSinTipoPaga as $value) {
            $empresaPaga = new EmpresaTipoPaga();

            $empresaPaga
                ->setEmpresa($value)
                ->setTipo(EmpresaTipoPaga::POSPAGO)
                ->setSaldo(0);

            $this->em->persist($empresaPaga);
        }

        $this->em->flush();
    }
}
