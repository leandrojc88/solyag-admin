<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Types\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
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
        $q = $this->createQueryBuilder('se')
            ->select(
                '
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
                se.id_confir_proveedor'
            )
            ->join(
                'App\Entity\Empresas',
                'em',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'se.empresa = em.id'
            )
            ->join(
                'App\Entity\Empleados',
                'emp',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'se.empleado = emp.id'
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
            );
            // ->andWhere('se.empresa = :empresa')
            // ->andWhere('s.isDtone = false')
            // ->andWhere('se.status = :status')
            // ->setParameter('empresa', $empresa)
            // ->setParameter('status', Status::INIT)
            // dd($filtros);
            foreach ($filtros as $value) {
                // dd("'$key = $value'");
                $q->andWhere($value);
            }

            $q->orderBy('se.date', 'DESC')
            // ->setMaxResults($limit)
            ->getQuery();
            // ->getResult();
            // dd($q);
            return $q;
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
