<?php

namespace App\Service\Campanna\Empresa;

use App\Entity\Campanna\HistorySaldoCampanna;
use App\Entity\Empresas;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class RegisterSaldoToHostory
{

    private EntityManagerInterface $em;
    private Security $security;

    public function __construct(
        EntityManagerInterface $em,
        Security $security
    ) {
        $this->em = $em;
        $this->security = $security;
    }

    public function __invoke($idEmpresa, $saldo, $tipo)
    {
        $user = $this->security->getUser();

        $historialSaldoCampanna = new HistorySaldoCampanna();

        $historialSaldoCampanna
            ->setFecha(new DateTime())
            ->setEmpresa($this->em->getRepository(Empresas::class)->find($idEmpresa))
            ->setSaldo($saldo)
            ->setUser($user)
            ->setTipo($tipo);

        $this->em->persist($historialSaldoCampanna);
        $this->em->flush();
    }
}
