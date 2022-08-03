<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Provincias;
use App\Repository\MunicipiosRepository;
use App\Repository\ProvinciasRepository;
use App\Service\Remesas\ConfigPais\Exceptions\ProvinciaInUseException;
use Doctrine\ORM\EntityManagerInterface;

class DeleteProvincia
{

    private MunicipiosRepository $municipiosRepository;
    private ProvinciasRepository $provinciasRepository;
    private EntityManagerInterface $em;

    public function __construct(
        MunicipiosRepository $municipiosRepository,
        EntityManagerInterface $em,
        ProvinciasRepository $provinciasRepository
    ) {
        $this->em = $em;
        $this->provinciasRepository = $provinciasRepository;
        $this->municipiosRepository = $municipiosRepository;
    }
    public function __invoke($id)
    {
        $provincia = $this->provinciasRepository->find($id);
        $this->ensureProvinciaNotHaveMunicipios($provincia);

        $this->em->remove($provincia);
        $this->em->flush();
    }

    private function ensureProvinciaNotHaveMunicipios(Provincias $provincia)
    {
        $isExist = $this->municipiosRepository->findBy(['provincia' => $provincia]);

        if ($isExist) throw new ProvinciaInUseException($provincia->getNombre());
    }
}
