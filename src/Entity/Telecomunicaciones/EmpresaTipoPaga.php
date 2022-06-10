<?php

namespace App\Entity\Telecomunicaciones;

use App\Entity\Empresas;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaTipoPagaRepository::class)
 */
class EmpresaTipoPaga
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $saldo;

    /**
     * @ORM\OneToOne(targetEntity=Empresas::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getSaldo(): ?int
    {
        return $this->saldo;
    }

    public function setSaldo(int $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getEmpresa(): ?Empresas
    {
        return $this->empresa;
    }

    public function setEmpresa(Empresas $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }
}
