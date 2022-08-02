<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Pais;
use App\Entity\Provincias;
use App\Repository\ProvinciasRepository;
use App\Service\Remesas\ConfigPais\Exceptions\ProvinciaExistExceptions;
use Doctrine\ORM\EntityManagerInterface;

class CreateProvincia
{

    private ProvinciasRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(
        ProvinciasRepository $repository,
        EntityManagerInterface $em
    ) {
        $this->repository = $repository;
        $this->em = $em;
    }
    public function __invoke(string $provinciaName, int $idPais): Provincias
    {
        $pais = $this->em->getRepository(Pais::class)->find($idPais);
        $this->ensureProvinciaDoNotExist($provinciaName, $pais);

        $provincia = new Provincias();
        $provincia
            ->setNombre($provinciaName)
            ->setPais($pais)
            ->setActivo(true);
        $this->em->persist($provincia);
        $this->em->flush();

        return $provincia;
    }

    private function ensureProvinciaDoNotExist(string $nombre, Pais $pais)
    {
        $isExist = $this->repository->findBy(['nombre' => $nombre, 'pais' => $pais]);

        if ($isExist) throw new ProvinciaExistExceptions($nombre, $pais->getNombre());
    }
}