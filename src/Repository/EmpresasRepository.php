<?php

namespace App\Repository;

use App\Entity\Empresas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
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

    public function listEmpresa()
    {

        return $this->createQueryBuilder('e')
            ->select('e.id as id_empresa, e.nombre, tp.id, tp.saldo, tp.tipo, eld.costo as costo_larga_distancia')
            ->leftJoin(
                'App\Entity\Telecomunicaciones\EmpresaTipoPaga',
                'tp',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'e.id = tp.empresa'
            )
            ->leftJoin(
                'App\Entity\Telecomunicaciones\EmpresaLargaDistancia',
                'eld',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'e.id = eld.empresa'
            )
            ->andWhere('e.activo = true')
            ->orderBy('e.nombre', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function empresasSinTipoPago()
    {
        $sql = "SELECT * FROM empresas
                WHERE id not in (SELECT empresa_id FROM empresa_tipo_paga) and activo=TRUE";

        $rsm = new ResultSetMapping();
        // para obtener mas datos de la empresa q no sea solo el {id} tengo q poner mas `addFieldResult`
        $rsm->addEntityResult('App\Entity\Empresas', 'e');
        $rsm->addFieldResult('e', 'id', 'id');

        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $results = $query->getResult();
        return $results;
    }

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
