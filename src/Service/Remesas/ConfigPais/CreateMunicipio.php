<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Provincias;
use App\Repository\MunicipiosRepository;
use App\Service\Remesas\ConfigPais\Exceptions\MunicipioExistExceptions;
use Doctrine\ORM\EntityManagerInterface;

class CreateMunicipio
{

    private MunicipiosRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(
        MunicipiosRepository $repository,
        EntityManagerInterface $em
    ) {
        $this->repository = $repository;
        $this->em = $em;
    }
    public function __invoke(string $municipioName, int $idProvincia): Municipios
    {
        $provincia = $this->em->getRepository(Provincias::class)->find($idProvincia);
        $this->ensureMunicipioDoNotExist($municipioName, $provincia);

        $municipio = new Municipios();
        $municipio
            ->setNombre($municipioName)
            ->setProvincia($provincia)
            ->setActivo(true);
        $this->em->persist($municipio);
        $this->em->flush();

        return $municipio;
    }

    private function ensureMunicipioDoNotExist(string $nombre, Provincias $provincia)
    {
        $isExist = $this->repository->findBy(['nombre' => $nombre, 'provincia' => $provincia]);

        if ($isExist) throw new MunicipioExistExceptions($nombre, $provincia->getNombre());
    }
}
