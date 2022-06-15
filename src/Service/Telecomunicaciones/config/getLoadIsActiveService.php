<?php

namespace App\Service\Telecomunicaciones\Config;

use App\Repository\TelecomConfigsRepository;

class GetLoadIsActiveService
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
