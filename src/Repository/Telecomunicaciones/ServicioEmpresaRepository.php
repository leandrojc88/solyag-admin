<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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

    public function getMaxNoOrden($servicio){
        return $this->createQueryBuilder('s')
            ->select('MAX(s.no_orden) AS max_no_orden')
            ->andWhere('s.servicio = :servicio')
            ->setParameter('servicio', $servicio)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
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
