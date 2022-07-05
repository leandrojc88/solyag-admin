<?php

namespace App\Service\Telecomunicaciones\LargaDistancia;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use App\Types\ResponseLargaDistancia;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;

class ExecutorLargaDistancia
{
    private EntityManagerInterface $em;
    private SoapLargaDistancia $soapLargaDistancia;

    public function __construct(
        EntityManagerInterface $em,
        SoapLargaDistancia $soapLargaDistancia
    ) {
        $this->em = $em;
        $this->soapLargaDistancia = $soapLargaDistancia;
    }
    public function __invoke(
        EmpresaLargaDistanciaRegister $empresaLargaDistanciaRegiter,
        $precio,
        $telefono
    ) {
        if ($empresaLargaDistanciaRegiter->getStatus() == Status::INIT) {

            /** @var ResponseLargaDistancia $response */
            $response = ($this->soapLargaDistancia)($precio, $telefono);

            $empresaLargaDistanciaRegiter
                ->setIdConfirProveedor($response->getResult())
                ->setConfirmationDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
                ->setStatus("" . $response->getStatus());

            $this->em->persist($empresaLargaDistanciaRegiter);
            $this->em->flush();
        }
    }
}
