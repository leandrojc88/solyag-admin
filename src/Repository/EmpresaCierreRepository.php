<?php

namespace App\Repository;

use App\Entity\EmpresaCierre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaCierre|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaCierre|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaCierre[]    findAll()
 * @method EmpresaCierre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaCierreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaCierre::class);
    }

    // /**
    //  * @return EmpresaCierre[] Returns an array of EmpresaCierre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmpresaCierre
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
