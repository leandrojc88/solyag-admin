<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\RecargasCubacelManualToDTOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecargasCubacelManualToDTOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecargasCubacelManualToDTOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecargasCubacelManualToDTOne[]    findAll()
 * @method RecargasCubacelManualToDTOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecargasCubacelManualToDTOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecargasCubacelManualToDTOne::class);
    }

    // /**
    //  * @return RecargasCubacelManualToDTOne[] Returns an array of RecargasCubacelManualToDTOne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecargasCubacelManualToDTOne
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
