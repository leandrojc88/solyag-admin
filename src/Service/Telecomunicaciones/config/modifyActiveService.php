<?php

namespace App\Service\Telecomunicaciones\Config;

use App\Repository\TelecomConfigsRepository;
use Doctrine\ORM\EntityManagerInterface;

class ModifyActiveService
{

    private TelecomConfigsRepository $telecomConfigsRepository;
    private EntityManagerInterface $em;

    public function __construct(
        TelecomConfigsRepository $telecomConfigsRepository,
        EntityManagerInterface $em
    ) {
        $this->telecomConfigsRepository = $telecomConfigsRepository;
        $this->em = $em;
    }

    public function update(bool $active): void
    {

        $config = $this->telecomConfigsRepository->find(1);

        $config->setActiveApiDtone($active);

        $this->em->persist($config);
        $this->em->flush();
    }
}
