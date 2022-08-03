<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Pais;
use App\Repository\PaisRepository;
use App\Repository\ProvinciasRepository;
use App\Service\Remesas\ConfigPais\Exceptions\PaisInUseException;
use Doctrine\ORM\EntityManagerInterface;

class DeletePais
{

    private PaisRepository $paisRepository;
    private ProvinciasRepository $provinciasRepository;
    private EntityManagerInterface $em;

    public function __construct(
        PaisRepository $paisRepository,
        EntityManagerInterface $em,
        ProvinciasRepository $provinciasRepository
    ) {
        $this->paisRepository = $paisRepository;
        $this->em = $em;
        $this->provinciasRepository = $provinciasRepository;
    }
    public function __invoke($id)
    {
        $pais = $this->paisRepository->find($id);
        $this->ensurePaisNotHaveProvincias($pais);

        $this->em->remove($pais);
        $this->em->flush();
    }

    private function ensurePaisNotHaveProvincias(Pais $pais)
    {
        $isExist = $this->provinciasRepository->findBy(['pais' => $pais]);

        if ($isExist) throw new PaisInUseException($pais->getNombre());
    }
}
