<?php

namespace App\Service\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Repository\EmpleadosRepository;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Error;
use Status;

class ServicioEmpresaService
{
    private EntityManagerInterface $em;
    private EmpresasRepository $empresasRepository;
    private EmpleadosRepository $empleadosRepository;
    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private SubservicioRepository $subservicioRepository;

    public function __construct(
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpleadosRepository $empleadosRepository,
        ServicioEmpresaRepository $servicioEmpresaRepository,
        SubservicioRepository $subservicioRepository
    ) {
        $this->em = $em;
        $this->empresasRepository = $empresasRepository;
        $this->empleadosRepository = $empleadosRepository;
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->subservicioRepository = $subservicioRepository;
    }


    public function createServicioEmpresa($params)
    {

        $maxNoOrdenFind = $this->servicioEmpresaRepository->getMaxNoOrden($params['id_servicio']);
        $maxNoOrden = intval($maxNoOrdenFind[0]['max_no_orden']);


        $servicioEmpresa = new ServicioEmpresa();
        $servicioEmpresa
            ->setNoTelefono($params['no_telefono'])
            ->setDate(\DateTime::createFromFormat('Y-m-d h:i:s A', Date('Y-m-d h:i:s A')))
            ->setEmpresa($this->empresasRepository->find($params['id_empresa']))
            ->setEmpleado($this->empleadosRepository->findOneBy(['correo' => $params['email']]))
            ->setServicio($params['id_servicio'])
            // ->setSubServicio($params['sub_servicio'])
            ->setMovimientoVenta($params['movimiento_venta'])
            ->setNoOrden($maxNoOrden + 1);

        // asignar el subservicio o poner un msg de error y declinarlo

        $subservicio = $this->subservicioRepository->find($params['id_api']);

        if ($subservicio)
            $servicioEmpresa
                ->setStatus(Status::INIT)
                ->setSubServicio($subservicio);
        else {
            $servicioEmpresa
                ->setStatus(Status::DECLINED)
                ->setResponse(
                    ["errors" => [[
                        "code" => null,
                        "message" => "No existe el subservicio o no esta configurado el costo para la empresa (" . $params['sub_servicio'] . ")"
                    ]]]
                );
        }

        $this->em->persist($servicioEmpresa);
        $this->em->flush();
    }

    /**
     * Convertir el numeor de orden al formato {#####} {id_servicio+ 4# que es el numero de orden}
     * 10004, 10054, etc....
     */
    public function noOrdeToStr(ServicioEmpresa $servicioEmpresa)
    {
        $servicio = $servicioEmpresa->getServicio();
        $noOrden = $servicioEmpresa->getNoOrden();

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

    /**
     * retorna el [servicio, no_orden] de un string con la definicion del numero de orden
     * $noOrdenStr = 1-0001  return [1, 1]
     */
    public function getNoOrdenFromStr($noOrdenStr): array
    {
        $result = explode('-', $noOrdenStr);

        $servicio = intval($result[0]);

        $noOrden = intval($result[1]);

        return [$servicio, $noOrden];
    }


    /**
     * Obtener un {ServicioEmpresa} por un numero de orden determinado
     */
    public function getServicioEmpresaByNoOrden($noOrdenStr): ServicioEmpresa
    {

        $data = $this->getNoOrdenFromStr($noOrdenStr);

        $servicioEmpresa = $this->servicioEmpresaRepository->findOneBy([
            'servicio' => $data[0],
            'no_ordne' => $data[1]
        ]);

        if (!$servicioEmpresa) throw new Error('No existe el servicio-empresa para el no_orden ' . $noOrdenStr);

        return $servicioEmpresa;
    }

    /**
     * llenando la data para enviar a solyag.online para actualizar el no_orden y 
     * status de los movimientos_servicios
     *
     *  [ id_empresa,
     *    servicios = [
     *            [ movimiento_venta, no_orden, status ], ...
     *        ]
     *    ]
     */
    public function prepareDataToSolyagApp($data, ServicioEmpresa $trasaccion)
    {
        foreach ($data as $key => &$item) {

            if ($item['id_empresa'] == $trasaccion->getEmpresa()->getId()) {
                array_push(
                    $item['servicios'],
                    [
                        'movimiento_venta' => $trasaccion->getMovimientoVenta(),
                        'no_orden' => $this->noOrdeToStr($trasaccion),
                        'status' => $trasaccion->getStatus(),
                    ]
                );
                return $data;
            }
        }

        $data[] = [
            'id_empresa' => $trasaccion->getEmpresa()->getId(),
            'servicios' => [
                [
                    'movimiento_venta' => $trasaccion->getMovimientoVenta(),
                    'no_orden' => $this->noOrdeToStr($trasaccion),
                    'status' => $trasaccion->getStatus()
                ]
            ]
        ];

        return $data;
    }
}
