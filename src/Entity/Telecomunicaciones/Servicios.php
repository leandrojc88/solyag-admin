<?php

namespace App\Entity\Telecomunicaciones;

use App\Repository\Telecomunicaciones\ServiciosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiciosRepository::class)
 */
class Servicios
{
    const ID_RECARGA_CUBACEL = 1;
    const ID_LARGA_DISTANCIA = 3;
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $abreviatura;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $activo;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getAbreviatura(): ?string
    {
        return $this->abreviatura;
    }

    public function setAbreviatura(?string $abreviatura): self
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public static function getDescriptionByIdServicio(int $idServicio)
    {
        switch ($idServicio) {
            case self::ID_RECARGA_CUBACEL:
                return 'Recarga Cubacel';

            case self::ID_LARGA_DISTANCIA:
                return 'Larga Distancia';

            default:
                return '--no servicio--';
        }
    }

    public static function getArrayServicio()
    {
        return [
            self::ID_RECARGA_CUBACEL => 'Recarga Cubacel',
            self::ID_LARGA_DISTANCIA => 'Larga Distancia'
        ];
    }
}
