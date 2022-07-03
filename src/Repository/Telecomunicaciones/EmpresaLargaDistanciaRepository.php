<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\EmpresaLargaDistancia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaLargaDistancia|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaLargaDistancia|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaLargaDistancia[]    findAll()
 * @method EmpresaLargaDistancia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaLargaDistanciaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaLargaDistancia::class);
    }

    // /**
    //  * @return EmpresaLargaDistancia[] Returns an array of EmpresaLargaDistancia objects
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
    public function findOneBySomeField($value): ?EmpresaLargaDistancia
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
