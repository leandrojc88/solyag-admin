<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Repository\MunicipiosRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteMunicipio
{

    private MunicipiosRepository $municipiosRepository;
    private EntityManagerInterface $em;

    public function __construct(
        MunicipiosRepository $municipiosRepository,
        EntityManagerInterface $em
    ) {
        $this->em = $em;
        $this->municipiosRepository = $municipiosRepository;
    }
    public function __invoke($id)
    {
        $municipio = $this->municipiosRepository->find($id);

        $this->em->remove($municipio);
        $this->em->flush();
    }
}
