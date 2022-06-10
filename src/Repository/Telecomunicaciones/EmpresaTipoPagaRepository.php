<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaTipoPaga|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaTipoPaga|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaTipoPaga[]    findAll()
 * @method EmpresaTipoPaga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaTipoPagaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaTipoPaga::class);
    }

    // /**
    //  * @return EmpresaTipoPaga[] Returns an array of EmpresaTipoPaga objects
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
    public function findOneBySomeField($value): ?EmpresaTipoPaga
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
