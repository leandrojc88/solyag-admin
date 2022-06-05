<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\ServicioEmpresaPhp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServicioEmpresaPhp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicioEmpresaPhp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicioEmpresaPhp[]    findAll()
 * @method ServicioEmpresaPhp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicioEmpresaPhpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicioEmpresaPhp::class);
    }

    // /**
    //  * @return ServicioEmpresaPhp[] Returns an array of ServicioEmpresaPhp objects
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
    public function findOneBySomeField($value): ?ServicioEmpresaPhp
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
