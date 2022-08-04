<?php

declare(strict_types=1);

namespace App\Service\Remesas\Moneda;

use App\Entity\Empresas;
use App\Entity\Pais;
use App\Entity\Remesa\MonedaPais;
use App\Repository\PaisRepository;
use App\Repository\Remesa\MonedaPaisRepository;
use App\Service\Remesas\ConfigPais\Exceptions\PaisExistExceptions;
use App\Service\Remesas\Moneda\Exceptions\MonedaPaisExistExceptions;
use Doctrine\ORM\EntityManagerInterface;

class CreateMonedaPais
{

    private MonedaPaisRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(
        MonedaPaisRepository $repository,
        EntityManagerInterface $em
    ) {
        $this->repository = $repository;
        $this->em = $em;
    }
    public function __invoke($idEmpresa, $idPais, $moneda, $valor)
    {
        $empresa = $this->em->getRepository(Empresas::class)->find($idEmpresa);
        $pais = $this->em->getRepository(Pais::class)->find($idPais);

        $this->ensureMonedaPaisDoNotExist($empresa, $pais, $moneda);

        $monedaPais = new MonedaPais();
        $monedaPais
            ->setPais($pais)
            ->setEmpresa($empresa)
            ->setMoneda($moneda)
            ->setValorConversion(floatval($valor))
            ->setStatus('1');
        $this->em->persist($monedaPais);
        $this->em->flush();
    }

    private function ensureMonedaPaisDoNotExist($empresa, $pais, $moneda)
    {
        $isExist = $this->repository->findOneBy(['pais' => $pais, 'empresa' => $empresa, 'moneda' => $moneda]);

        if ($isExist) throw new MonedaPaisExistExceptions($moneda);
    }
}
