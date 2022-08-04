<?php

namespace App\Entity\Remesa;

use App\Entity\Empresas;
use App\Entity\Pais;
use App\Repository\Remesa\MonedaPaisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonedaPaisRepository::class)
 */
class MonedaPais
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pais::class, inversedBy="provincias")
     */
    private $pais;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moneda;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor_conversion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPais(): ?Pais
    {
        return $this->pais;
    }

    public function setPais(?Pais $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getValorConversion(): ?float
    {
        return $this->valor_conversion;
    }

    public function setValorConversion(?float $valor_conversion): self
    {
        $this->valor_conversion = $valor_conversion;

        return $this;
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
}
