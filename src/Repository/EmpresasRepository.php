<?php

namespace App\Repository;

use App\Entity\Empresas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Empresas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Empresas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Empresas[]    findAll()
 * @method Empresas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empresas::class);
    }

    // /**
    //  * @return Empresas[] Returns an array of Empresas objects
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
    public function findOneBySomeField($value): ?Empresas
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function arrayModules($id_empresa): array
    {

        $func = function ($valor) {            
            return $valor['id_modulo'];
        };

        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT e.id, m.id as id_modulo
            FROM App\Entity\ModulosEmpresas e
            LEFT JOIN e.id_modulo m
            WHERE e.id_empresa = :p_id_empresa'
        )
            ->setParameter('p_id_empresa', $id_empresa)
            ->getArrayResult();

        return  array_map($func, $query);
    }
}
