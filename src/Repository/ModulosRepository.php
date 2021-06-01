<?php

namespace App\Repository;

use App\Entity\Modulos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Modulos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modulos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modulos[]    findAll()
 * @method Modulos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModulosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modulos::class);
    }

    // /**
    //  * @return Modulos[] Returns an array of Modulos objects
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
    public function findOneBySomeField($value): ?Modulos
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
