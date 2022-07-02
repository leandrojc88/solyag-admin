<?php

namespace App\Service\Telecomunicaciones\Empresas;

use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\HistorialSaldoEmpresa;
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

    public function __invoke($idEmpresa, $saldo)
    {
        $user = $this->security->getUser();

        $historialSaldoEmpresa = new HistorialSaldoEmpresa();

        $historialSaldoEmpresa
            ->setFecha(new DateTime())
            ->setEmpresa($this->em->getRepository(Empresas::class)->find($idEmpresa))
            ->setSaldo($saldo)
            ->setUser($user);

        $this->em->persist($historialSaldoEmpresa);
        $this->em->flush();
    }
}
