<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\EmpresaSubservicioSolyag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaSubservicioSolyag|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaSubservicioSolyag|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaSubservicioSolyag[]    findAll()
 * @method EmpresaSubservicioSolyag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaSubservicioSolyagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaSubservicioSolyag::class);
    }

    // /**
    //  * @return EmpresaSubservicioSolyag[] Returns an array of EmpresaSubservicioSolyag objects
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
    public function findOneBySomeField($value): ?EmpresaSubservicioSolyag
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
