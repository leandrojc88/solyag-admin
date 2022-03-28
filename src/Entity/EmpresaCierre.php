<?php

namespace App\Entity;

use App\Repository\EmpresaCierreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaCierreRepository::class)
 */
class EmpresaCierre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class, inversedBy="empresaCierres")
     */
    private $empresa;

    /**
     * @ORM\Column(type="integer")
     */
    private $idAgencia;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cierre;

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

    public function getIdAgencia(): ?int
    {
        return $this->idAgencia;
    }

    public function setIdAgencia(int $idAgencia): self
    {
        $this->idAgencia = $idAgencia;

        return $this;
    }

    public function getCierre(): ?bool
    {
        return $this->cierre;
    }

    public function setCierre(bool $cierre): self
    {
        $this->cierre = $cierre;

        return $this;
    }
}
