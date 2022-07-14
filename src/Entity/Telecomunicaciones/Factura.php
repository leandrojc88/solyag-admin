<?php

namespace App\Entity\Telecomunicaciones;

use App\Entity\Empresas;
use App\Repository\Telecomunicaciones\FacturaRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=FacturaRepository::class)
 */
class Factura
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_factura;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moneda;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\Column(type="datetime")
     */
    private $periodo_inicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $periodo_fin;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getNoFactura(): ?int
    {
        return $this->no_factura;
    }

    public function setNoFactura(int $no_factura): self
    {
        $this->no_factura = $no_factura;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getEmpresa(): ?Empresas
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresas $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getPeriodoInicio(): ?\DateTimeInterface
    {
        return $this->periodo_inicio;
    }

    public function setPeriodoInicio(\DateTimeInterface $periodo_inicio): self
    {
        $this->periodo_inicio = $periodo_inicio;

        return $this;
    }

    public function getPeriodoFin(): ?\DateTimeInterface
    {
        return $this->periodo_fin;
    }

    public function setPeriodoFin(\DateTimeInterface $periodo_fin): self
    {
        $this->periodo_fin = $periodo_fin;

        return $this;
    }

    /**
     * retorna el numero de orden en un formato correcto
     * ejemplo: no_orden=1  return= "000001"
     */
    public function getNoFacturaStr(){
        $noFactura = $this->getNoFactura();

        return str_replace(($noFactura / 100000) . "", ".", "");
    }
}
