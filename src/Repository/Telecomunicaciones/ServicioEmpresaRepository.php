<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Types\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServicioEmpresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicioEmpresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicioEmpresa[]    findAll()
 * @method ServicioEmpresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicioEmpresaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicioEmpresa::class);
    }

    public function getMaxNoOrden($servicio)
    {
        return $this->createQueryBuilder('s')
            ->select('MAX(s.no_orden) AS max_no_orden')
            ->andWhere('s.servicio = :servicio')
            ->setParameter('servicio', $servicio)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }


    public function getRecargaCubacelManual($empresa = null)
    {
        $q = $this->createQueryBuilder('se')
            ->select('se.id, se.no_telefono, se.status, se.date, se.servicio, se.no_orden, s.descripcion, ecc.costo, em.nombre as empresa')
            ->join(
                'App\Entity\Empresas',
                'em',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'se.empresa = em.id'
            )
            ->leftJoin(
                'App\Entity\Telecomunicaciones\Subservicio',
                's',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'se.sub_servicio = s.id'
            )
            ->leftJoin(
                'App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel',
                'ecc',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'ecc.id_empresa = se.empresa and ecc.id_subservicio = s.id'
            )
            ->andWhere('s.isDtone = false')
            ->andWhere('se.status = :status');

        if ($empresa)
            $q->andWhere('se.empresa = :empresa')
                ->setParameter('empresa', $empresa);

        $q->setParameter('status', Status::INIT)
            ->orderBy('se.date');

        return $q->getQuery()->getResult();
    }

    public function getListRecargaCubacel($filtros)
    {

        $where  = count($filtros) ? "WHERE " . join(" AND ", $filtros) : "";

        $sql = "WITH  selected AS (
            SELECT
                se.id,
                em.nombre as empresa,
                s.descripcion,
                emp.nombre as empleado,
                se.no_orden,
                se.no_telefono,
                se.status,
                se.date,
                se.confirmation_date,
                se.servicio,
                ecc.costo,
                se.id_confir_proveedor
            FROM servicio_empresa se
            INNER JOIN empresas em ON se.empresa_id = em.id
            INNER JOIN empleados emp ON se.empleado_id = emp.id
            LEFT JOIN subservicio s ON se.sub_servicio_id = s.id
            LEFT JOIN empresa_subservicio_cubacel ecc ON ecc.id_empresa_id = se.empresa_id and ecc.id_subservicio_id = s.id

            UNION

            SELECT
                ld.id,
                em.nombre as empresa,
                'Larga Distancia' as descripcion,
                emp.nombre as empleado,
                ld.no_orden,
                ld.no_telefono,
                ld.status,
                ld.date,
                ld.confirmation_date,
                '3' as servicio,
                ld.costo,
                ld.id_confir_proveedor
            FROM empresa_larga_distancia_register ld
            INNER JOIN empresas em ON ld.empresa_id = em.id
            INNER JOIN empleados emp ON ld.empleado_id = emp.id
            )

            SELECT * FROM selected
            $where
            ORDER BY date DESC";

// dd($sql);
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('empresa', 'empresa');
        $rsm->addScalarResult('descripcion', 'descripcion');
        $rsm->addScalarResult('empleado', 'empleado');
        $rsm->addScalarResult('no_orden', 'no_orden');
        $rsm->addScalarResult('no_telefono', 'no_telefono');
        $rsm->addScalarResult('status', 'status');
        $rsm->addScalarResult('date', 'date');
        $rsm->addScalarResult('confirmation_date', 'confirmation_date');
        $rsm->addScalarResult('servicio', 'servicio');
        $rsm->addScalarResult('costo', 'costo');
        $rsm->addScalarResult('id_confir_proveedor', 'id_confir_proveedor');

        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $results = $query->getResult();
        return $results;
        // $q = $this->createQueryBuilder('se')
        //     ->select(
        //         '
        //         se.id,
        //         em.nombre as empresa,
        //         s.descripcion,
        //         emp.nombre as empleado,
        //         se.no_orden,
        //         se.no_telefono,
        //         se.status,
        //         se.date,
        //         se.confirmation_date,
        //         se.servicio,
        //         ecc.costo,
        //         se.id_confir_proveedor'
        //     )
        //     ->join(
        //         'App\Entity\Empresas',
        //         'em',
        //         \Doctrine\ORM\Query\Expr\Join::WITH,
        //         'se.empresa = em.id'
        //     )
        //     ->join(
        //         'App\Entity\Empleados',
        //         'emp',
        //         \Doctrine\ORM\Query\Expr\Join::WITH,
        //         'se.empleado = emp.id'
        //     )
        //     ->leftJoin(
        //         'App\Entity\Telecomunicaciones\Subservicio',
        //         's',
        //         \Doctrine\ORM\Query\Expr\Join::WITH,
        //         'se.sub_servicio = s.id'
        //     )
        //     ->leftJoin(
        //         'App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel',
        //         'ecc',
        //         \Doctrine\ORM\Query\Expr\Join::WITH,
        //         'ecc.id_empresa = se.empresa and ecc.id_subservicio = s.id'
        //     );
        //     foreach ($filtros as $value) {
        //         $q->andWhere($value);
        //     }

        //     $q->orderBy('se.date', 'DESC')
        //     ->getQuery();
        //     return $q;
    }

    // /**
    //  * @return ServicioEmpresa[] Returns an array of ServicioEmpresa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServicioEmpresa
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
