<?php

namespace App\Entity\Telecomunicaciones;

use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRegisterRepository;
use App\Entity\Empleados;
use App\Entity\Empresas;
use App\Model\ServiciosSolyag;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=EmpresaLargaDistanciaRegisterRepository::class)
 */
class EmpresaLargaDistanciaRegister implements ServiciosSolyag
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
    private $movimiento_venta;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $response = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $no_orden;

    /**
     * @ORM\Column(type="float")
     */
    private $costo;

    /**
     * @ORM\ManyToOne(targetEntity=Factura::class)
     */
    private $factura;

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

    public function getNoOrden(): ?int
    {
        return $this->no_orden;
    }

    public function setNoOrden(int $no_orden): self
    {
        $this->no_orden = $no_orden;

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

    /**
     * Convertir el numeor de orden al formato {#####} {id_servicio+ 4# que es el numero de orden}
     * 10004, 10054, etc....
     */
    public function noOrdeToStr(): string
    {
        $noOrden = $this->getNoOrden();

        if ($noOrden < 10) {
            return Servicios::ID_LARGA_DISTANCIA . '-000' . $noOrden;
        }
        if ($noOrden < 100) {
            return Servicios::ID_LARGA_DISTANCIA . '-00' . $noOrden;
        }
        if ($noOrden < 1000) {
            return Servicios::ID_LARGA_DISTANCIA . '-0' . $noOrden;
        }

        return Servicios::ID_LARGA_DISTANCIA . '-' . $noOrden;
    }

    public function getFactura(): ?Factura
    {
        return $this->factura;
    }

    public function setFactura(?Factura $factura): self
    {
        $this->factura = $factura;

        return $this;
    }
}
