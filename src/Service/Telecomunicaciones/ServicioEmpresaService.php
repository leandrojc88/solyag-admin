<?php



namespace App\Service\Telecomunicaciones;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Status;

class ServicioEmpresaService
{
    private EntityManagerInterface $em;
    private EmpresasRepository $empresasRepository;
    private EmpleadosRepository $empleadosRepository;

    public function __construct(
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpleadosRepository $empleadosRepository
    ) {
        $this->em = $em;
        $this->empresasRepository = $empresasRepository;
        $this->empleadosRepository = $empleadosRepository;
    }


    public function createServicioEmpresa($params)
    {

        $empledo = new ServicioEmpresa();
        $empledo
            ->setNoTelefono($params["no_telefono"])
            ->setDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
            ->setStatus(Status::INIT)
            ->setEmpresa($this->empresasRepository->find($params["id_empresa"]))
            ->setEmpleado($this->empleadosRepository->find($params["id_empleado"]))
            ->setServicio($params["id_servicio"]);

        $this->em->persist($empledo);
        $this->em->flush();
    }
}
