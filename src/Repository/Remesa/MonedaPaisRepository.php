<?php

namespace App\Repository\Remesa;

use App\Entity\Remesa\MonedaPais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MonedaPais|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonedaPais|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonedaPais[]    findAll()
 * @method MonedaPais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonedaPaisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonedaPais::class);
    }

    // /**
    //  * @return MonedaPais[] Returns an array of MonedaPais objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MonedaPais
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
