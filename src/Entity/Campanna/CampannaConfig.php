<?php

namespace App\Entity\Campanna;

use App\Entity\Empresas;
use App\Repository\Campanna\CampannaConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampannaConfigRepository::class)
 */
class CampannaConfig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\Column(type="float")
     */
    private $saldo;

    /**
     * @ORM\Column(type="float")
     */
    private $costo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpresa(): ?Empresas
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresas $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }
    public function getSaldo(): ?float
    {
        return $this->saldo;
    }

    public function setSaldo(float $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getCosto(): ?float
    {
        return $this->costo;
    }

    public function setCosto(float $costo): self
    {
        $this->costo = $costo;

        return $this;
    }
}
