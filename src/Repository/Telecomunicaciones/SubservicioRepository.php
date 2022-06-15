<?php

namespace App\Repository\Telecomunicaciones;

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
