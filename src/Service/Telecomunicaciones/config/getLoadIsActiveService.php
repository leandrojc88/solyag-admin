<?php

namespace App\Service\Telecomunicaciones\config;

use App\Repository\TelecomConfigsRepository;

class getLoadIsActiveService
{

    private TelecomConfigsRepository $telecomConfigsRepository;

    public function __construct(TelecomConfigsRepository $telecomConfigsRepository)
    {
        $this->telecomConfigsRepository = $telecomConfigsRepository;
    }

    public function get(): bool
    {

        $config = $this->telecomConfigsRepository->find(1);

        return $config->getActiveApiDtone();
    }
}
