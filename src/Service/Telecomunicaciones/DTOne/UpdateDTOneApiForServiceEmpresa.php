<?php

namespace App\Service\Telecomunicaciones\DTOne;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class UpdateDTOneApiForServiceEmpresa
{
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function __invoke($id_trasaccion, $id_proveedor, $fecha, $status, $json)
    {
        /** @var ServicioEmpresa $trasaccion */
        $trasaccion = $this->em->getRepository(ServicioEmpresa::class)->find($id_trasaccion);

        if (!$trasaccion)
            throw new Exception("No existe la transaccion en la bd `ServicioEmpresa`");

        // dd($json);
        $date = $fecha ? new \DateTime(explode(".", $fecha)[0] . '.000Z') : new DateTime();
        $trasaccion->setConfirmationDate($date);
        if ($id_proveedor) $trasaccion->setIdConfirProveedor($id_proveedor);
        $trasaccion->setStatus($status);
        $trasaccion->setResponse($json);

        $this->em->persist($trasaccion);
        $this->em->flush();
    }
}
