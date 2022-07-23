<?php

namespace App\Repository\Campanna;

use App\Entity\Campanna\CampannaConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampannaConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampannaConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampannaConfig[]    findAll()
 * @method CampannaConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampannaConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampannaConfig::class);
    }

    // /**
    //  * @return CampannaConfig[] Returns an array of CampannaConfig objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CampannaConfig
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
