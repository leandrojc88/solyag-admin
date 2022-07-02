<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\HistorialSaldoEmpresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistorialSaldoEmpresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistorialSaldoEmpresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistorialSaldoEmpresa[]    findAll()
 * @method HistorialSaldoEmpresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistorialSaldoEmpresaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistorialSaldoEmpresa::class);
    }

    public function listSubmayor($idEmpresa)
    {

        $sql = "(SELECT fecha, CONCAT(tipo, ' Saldo') as descripcion, saldo as valor , tipo, user_id as user
                    FROM historial_saldo_empresa
                    WHERE empresa_id = $idEmpresa)
                UNION
                (SELECT date as fecha, CONCAT(ser.nombre,' - ' , s.descripcion) as descripcion, cc.costo as valor, 'Disminuir', se.empleado_id as user
                    FROM servicio_empresa se
                    join subservicio s ON s.id = se.sub_servicio_id
                    join empresa_subservicio_cubacel cc ON cc.id_empresa_id = se.empresa_id and se.sub_servicio_id = cc.id_subservicio_id
                    join servicios ser ON ser.id = se.servicio
                    WHERE se.empresa_id = $idEmpresa)
                ORDER BY fecha;";

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('fecha', 'fecha');
        $rsm->addScalarResult('descripcion', 'descripcion');
        $rsm->addScalarResult('valor', 'valor');
        $rsm->addScalarResult('tipo', 'tipo');
        $rsm->addScalarResult('user', 'user');

        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $results = $query->getResult();
        return $results;
    }

    // /**
    //  * @return HistorialSaldoEmpresa[] Returns an array of HistorialSaldoEmpresa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistorialSaldoEmpresa
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
