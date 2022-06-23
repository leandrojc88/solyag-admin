<?php

namespace App\Entity\Telecomunicaciones;

use App\Entity\Empresas;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaSubservicioCubacelRepository::class)
 */
class EmpresaSubservicioCubacel
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
    private $id_empresa;

    /**
     * @ORM\ManyToOne(targetEntity=Subservicio::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_subservicio;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $costo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEmpresa(): ?Empresas
    {
        return $this->id_empresa;
    }

    public function setIdEmpresa(?Empresas $id_empresa): self
    {
        $this->id_empresa = $id_empresa;

        return $this;
    }

    public function getIdSubservicio(): ?Subservicio
    {
        return $this->id_subservicio;
    }

    public function setIdSubservicio(?Subservicio $id_subservicio): self
    {
        $this->id_subservicio = $id_subservicio;

        return $this;
    }

    public function getCosto(): ?float
    {
        return $this->costo;
    }

    public function setCosto(?float $costo): self
    {
        $this->costo = $costo;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }
}
