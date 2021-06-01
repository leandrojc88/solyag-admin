<?php

namespace App\Entity;

use App\Repository\ModulosEmpresasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModulosEmpresasRepository::class)
 */
class ModulosEmpresas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Modulos::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_modulo;

    /**
     * @ORM\ManyToOne(targetEntity=Empresas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdModulo(): ?Modulos
    {
        return $this->id_modulo;
    }

    public function setIdModulo(?Modulos $id_modulo): self
    {
        $this->id_modulo = $id_modulo;

        return $this;
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
}
