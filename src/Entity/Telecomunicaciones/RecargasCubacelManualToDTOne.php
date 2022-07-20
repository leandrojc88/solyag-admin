<?php

namespace App\Entity\Telecomunicaciones;

use App\Repository\Telecomunicaciones\RecargasCubacelManualToDTOneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecargasCubacelManualToDTOneRepository::class)
 */
class RecargasCubacelManualToDTOne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ServicioEmpresa::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $recarga;

    /**
     * @ORM\Column(type="integer")
     */
    private $productid_dtone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecarga(): ?ServicioEmpresa
    {
        return $this->recarga;
    }

    public function setRecarga(?ServicioEmpresa $recarga): self
    {
        $this->recarga = $recarga;

        return $this;
    }

    public function getProductidDtone(): ?int
    {
        return $this->productid_dtone;
    }

    public function setProductidDtone(int $productid_dtone): self
    {
        $this->productid_dtone = $productid_dtone;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
