<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Pais;
use App\Repository\PaisRepository;
use App\Service\Remesas\ConfigPais\Exceptions\PaisExistExceptions;
use Doctrine\ORM\EntityManagerInterface;

class CreatePais
{

    private PaisRepository $paisRepository;
    private EntityManagerInterface $em;

    public function __construct(
        PaisRepository $paisRepository,
        EntityManagerInterface $em
    ) {
        $this->paisRepository = $paisRepository;
        $this->em = $em;
    }
    public function __invoke(string $paisName): Pais
    {
        $this->ensurePaisDoNotExist($paisName);

        $pais = new Pais();
        $pais
            ->setNombre($paisName)
            ->setActivo(true);
        $this->em->persist($pais);
        $this->em->flush();

        return $pais;
    }

    private function ensurePaisDoNotExist(string $nombre)
    {
        $isExist = $this->paisRepository->findBy(['nombre' => $nombre]);

        if ($isExist) throw new PaisExistExceptions($nombre);
    }
}
