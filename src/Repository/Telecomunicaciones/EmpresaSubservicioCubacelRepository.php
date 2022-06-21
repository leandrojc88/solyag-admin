<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaSubservicioCubacel|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaSubservicioCubacel|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaSubservicioCubacel[]    findAll()
 * @method EmpresaSubservicioCubacel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaSubservicioCubacelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaSubservicioCubacel::class);
    }

    // /**
    //  * @return EmpresaSubservicioCubacel[] Returns an array of EmpresaSubservicioCubacel objects
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
    public function findOneBySomeField($value): ?EmpresaSubservicioCubacel
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
