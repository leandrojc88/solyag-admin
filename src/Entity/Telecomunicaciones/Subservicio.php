<?php

namespace App\Entity\Telecomunicaciones;

use App\Repository\Telecomunicaciones\SubservicioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubservicioRepository::class)
 */
class Subservicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Servicios::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_servicio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $productid_dtone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valor;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdServicio(): ?Servicios
    {
        return $this->id_servicio;
    }

    public function setIdServicio(?Servicios $id_servicio): self
    {
        $this->id_servicio = $id_servicio;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getProductidDtone(): ?int
    {
        return $this->productid_dtone;
    }

    public function setProductidDtone(?int $productid_dtone): self
    {
        $this->productid_dtone = $productid_dtone;

        return $this;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function setValor(?int $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}
