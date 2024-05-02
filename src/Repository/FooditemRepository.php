<?php

namespace App\Repository;

use App\Entity\Fooditem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fooditem>
 *
 * @method Fooditem|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fooditem|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fooditem[]    findAll()
 * @method Fooditem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FooditemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fooditem::class);
    }

    //    /**
    //     * @return Fooditem[] Returns an array of Fooditem objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Fooditem
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
