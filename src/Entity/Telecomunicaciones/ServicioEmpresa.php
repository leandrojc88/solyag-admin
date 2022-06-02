<?php

namespace App\Entity\Telecomunicaciones;

use App\Entity\Empleados;
use App\Entity\Empresas;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=ServicioEmpresaRepository::class)
 */
class ServicioEmpresa
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
     * @ORM\Column(type="string", length=255)
     */
    private $no_telefono;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity=Empleados::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empleado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_confir_proveedor;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $confirmation_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $servicio;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $response = [];

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sub_servicio;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getNoTelefono(): ?string
    {
        return $this->no_telefono;
    }

    public function setNoTelefono(string $no_telefono): self
    {
        $this->no_telefono = $no_telefono;

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

    public function getEmpresa(): ?Empresas
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresas $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getEmpleado(): ?Empleados
    {
        return $this->empleado;
    }

    public function setEmpleado(?Empleados $empleado): self
    {
        $this->empleado = $empleado;

        return $this;
    }

    public function getIdConfirProveedor(): ?int
    {
        return $this->id_confir_proveedor;
    }

    public function setIdConfirProveedor(int $id_confir_proveedor): self
    {
        $this->id_confir_proveedor = $id_confir_proveedor;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getConfirmationDate(): ?\DateTimeInterface
    {
        return $this->confirmation_date;
    }

    public function setConfirmationDate(\DateTimeInterface $confirmation_date): self
    {
        $this->confirmation_date = $confirmation_date;

        return $this;
    }

    public function getServicio(): ?int
    {
        return $this->servicio;
    }

    public function setServicio(int $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getResponse(): ?array
    {
        return $this->response;
    }

    public function setResponse(array $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getSubServicio(): ?string
    {
        return $this->sub_servicio;
    }

    public function setSubServicio(string $sub_servicio): self
    {
        $this->sub_servicio = $sub_servicio;

        return $this;
    }
}
