<?php

namespace App\Repository\Campanna;

use App\Entity\Campanna\HistorySaldoCampanna;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistorySaldoCampanna|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistorySaldoCampanna|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistorySaldoCampanna[]    findAll()
 * @method HistorySaldoCampanna[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistorySaldoCampannaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistorySaldoCampanna::class);
    }

    /*
    public function findOneBySomeField($value): ?HistorySaldoCampanna
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
