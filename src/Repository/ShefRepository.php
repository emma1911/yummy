<?php

namespace App\Repository;

use App\Entity\Shef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shef>
 *
 * @method Shef|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shef|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shef[]    findAll()
 * @method Shef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shef::class);
    }

    //    /**
    //     * @return Shef[] Returns an array of Shef objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Shef
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
