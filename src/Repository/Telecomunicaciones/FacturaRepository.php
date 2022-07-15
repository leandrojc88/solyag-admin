<?php

namespace App\Repository\Telecomunicaciones;

use App\Entity\Telecomunicaciones\Factura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Factura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Factura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Factura[]    findAll()
 * @method Factura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Factura::class);
    }

    public function getNextNoFactura()
    {
        $query = $this->createQueryBuilder('f')
            ->select('MAX(f.no_factura) AS max_no_factura')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return ($query[0]["max_no_factura"] ? $query[0]["max_no_factura"] : 0) + 1;
    }

    public static function noFacturaToStr($no_factura)
    {
        $no = ($no_factura / 10000) . "";
        return str_replace(".", "", $no);
    }
}
