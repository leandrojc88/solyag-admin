<?php

declare(strict_types=1);

namespace App\Service\Remesas\ConfigPais;

use App\Entity\Municipios;
use App\Entity\Pais;
use App\Entity\Provincias;
use App\Repository\MunicipiosRepository;
use App\Repository\PaisRepository;
use App\Repository\ProvinciasRepository;
use App\Service\Remesas\ConfigPais\Exceptions\ProvinciaExistExceptions;
use App\Types\Remesas\Zone;
use Doctrine\ORM\EntityManagerInterface;

class ListZonesByIdAndType
{

    private PaisRepository $paisRepository;
    private ProvinciasRepository $provinciasRepository;
    private MunicipiosRepository $municipiosRepository;

    public function __construct(
        PaisRepository $paisRepository,
        ProvinciasRepository $provinciasRepository,
        MunicipiosRepository $municipiosRepository
    ) {
        $this->paisRepository = $paisRepository;
        $this->provinciasRepository = $provinciasRepository;
        $this->municipiosRepository = $municipiosRepository;
    }
    public function __invoke(string $type, $id)
    {
        switch ($type) {
            case Pais::NAME:
                $zone = $this->paisRepository->findAll();
                break;

            case Provincias::NAME:
                $zone = $this->provinciasRepository->findBy(['pais' => $id]);
                break;

            case Municipios::NAME:
                $zone = $this->municipiosRepository->findBy(['provincia' => $id]);
                break;
        }

        return $zone;
    }

    private function ensureProvinciaDoNotExist(string $nombre, Pais $pais)
    {
        $isExist = $this->repository->findBy(['nombre' => $nombre, 'pais' => $pais]);

        if ($isExist) throw new ProvinciaExistExceptions($nombre, $pais->getNombre());
    }
}
