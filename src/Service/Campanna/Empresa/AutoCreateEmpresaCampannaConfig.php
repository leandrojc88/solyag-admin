<?php

namespace App\Service\Campanna\Empresa;

use App\Entity\Campanna\CampannaConfig;
use App\Repository\EmpresasRepository;
use Doctrine\ORM\EntityManagerInterface;

class AutoCreateEmpresaCampannaConfig
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

        $empresasSinTipoPaga = $this->empresasRepository->empresasSinCampannaConfig();

        foreach ($empresasSinTipoPaga as $value) {
            $campannaConfig = new CampannaConfig();

            $campannaConfig
                ->setEmpresa($value)
                ->setCosto(0)
                ->setSaldo(0);

            $this->em->persist($campannaConfig);
        }

        $this->em->flush();
    }
}
