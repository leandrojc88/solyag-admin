<?php

namespace App\Entity\Telecomunicaciones;

use App\Entity\Empleados;
use App\Entity\Empresas;
use App\Entity\Telecomunicaciones\Subservicio;
use App\Model\ServiciosSolyag;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=ServicioEmpresaRepository::class)
 */
class ServicioEmpresa implements ServiciosSolyag
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
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\Column(type="integer")
     */
    private $movimiento_venta;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $response = [];

    /**
     * @ORM\ManyToOne(targetEntity=Subservicio::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $sub_servicio;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_orden;

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

    public function getIdConfirProveedor(): ?string
    {
        return $this->id_confir_proveedor;
    }

    public function setIdConfirProveedor(string $id_confir_proveedor): self
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

    public function getMovimientoVenta(): ?int
    {
        return $this->movimiento_venta;
    }

    public function setMovimientoVenta(int $movimiento_venta): self
    {
        $this->movimiento_venta = $movimiento_venta;

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

    public function getSubServicio(): ?Subservicio
    {
        return $this->sub_servicio;
    }

    public function setSubServicio(Subservicio $sub_servicio): self
    {
        $this->sub_servicio = $sub_servicio;

        return $this;
    }

    public function getNoOrden(): ?int
    {
        return $this->no_orden;
    }

    public function setNoOrden(int $no_orden): self
    {
        $this->no_orden = $no_orden;

        return $this;
    }

    /**
     * Convertir el numeor de orden al formato {#####} {id_servicio+ 4# que es el numero de orden}
     * 10004, 10054, etc....
     */
    public function noOrdeToStr(): string
    {
        $servicio = $this->getServicio();
        $noOrden = $this->getNoOrden();

        if ($noOrden < 10) {
            return $servicio . '-000' . $noOrden;
        }
        if ($noOrden < 100) {
            return $servicio . '-00' . $noOrden;
        }
        if ($noOrden < 1000) {
            return $servicio . '-0' . $noOrden;
        }

        return $servicio . '-' . $noOrden;
    }

}
