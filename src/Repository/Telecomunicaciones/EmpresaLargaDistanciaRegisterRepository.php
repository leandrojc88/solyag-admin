<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\EmpresaLargaDistanciaRegister;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaLargaDistanciaRegister|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaLargaDistanciaRegister|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaLargaDistanciaRegister[]    findAll()
 * @method EmpresaLargaDistanciaRegister[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaLargaDistanciaRegisterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaLargaDistanciaRegister::class);
    }

    public function getMaxNoOrden()
    {
        return $this->createQueryBuilder('s')
            ->select('MAX(s.no_orden) AS max_no_orden')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function getListInPeriodByEmpresa($empresa, $periodo_inicio, $periodo_fin)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.empresa = :empresa')
            ->andWhere('s.date >= :periodo_inicio')
            ->andWhere('s.date <= :periodo_fin')
            ->setParameter('empresa', $empresa)
            ->setParameter('periodo_inicio', $periodo_inicio . " 00:00:00")
            ->setParameter('periodo_fin', $periodo_fin . " 23:59:59")
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return EmpresaLargaDistanciaRegister[] Returns an array of EmpresaLargaDistanciaRegister objects
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
    public function findOneBySomeField($value): ?EmpresaLargaDistanciaRegister
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
