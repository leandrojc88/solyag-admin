<?php

namespace App\Repository;

use App\Entity\ModulosEmpresas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModulosEmpresas|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModulosEmpresas|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModulosEmpresas[]    findAll()
 * @method ModulosEmpresas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModulosEmpresasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModulosEmpresas::class);
    }

    // /**
    //  * @return ModulosEmpresas[] Returns an array of ModulosEmpresas objects
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
    public function findOneBySomeField($value): ?ModulosEmpresas
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
