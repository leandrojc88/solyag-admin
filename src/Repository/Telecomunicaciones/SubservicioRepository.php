<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\Servicios;
use App\Entity\Telecomunicaciones\Subservicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subservicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subservicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subservicio[]    findAll()
 * @method Subservicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubservicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subservicio::class);
    }

    /**
     * listdo de todos los subservicios y la configuracion de la empresa
     * para las recargas de cubacel
     */
    public function listSubserviciosEmpresaRecargaCubacel($id_empresa)
    {

        return $this->createQueryBuilder('s')
            // ->select('s, ess')
            ->select('s.id as id_subservicio, s.descripcion, ess.id as id_empresa_subs_solyag, ess.costo')
            ->leftJoin(
                'App\Entity\Telecomunicaciones\EmpresaSubservicioSolyag',
                'ess',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                's.id = ess.id_subservicio and ess.id_empresa = :id_empresa'
            )
            ->andWhere('s.id_servicio = :id_servicio')
            // ->orderBy('e.nombre', 'ASC')
            ->getQuery()
            ->setParameter('id_empresa', $id_empresa)
            ->setParameter('id_servicio', Servicios::ID_RECARGA_CUBACEL)
            ->getResult();
    }

    // /**
    //  * @return Subservicio[] Returns an array of Subservicio objects
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
    public function findOneBySomeField($value): ?Subservicio
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
