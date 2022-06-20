<?php

namespace App\Entity;

use App\Repository\TelecomConfigsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelecomConfigsRepository::class)
 */
class TelecomConfigs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activeApiDtone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActiveApiDtone(): ?bool
    {
        return $this->activeApiDtone;
    }

    public function setActiveApiDtone(bool $activeApiDtone): self
    {
        $this->activeApiDtone = $activeApiDtone;

        return $this;
    }
}
