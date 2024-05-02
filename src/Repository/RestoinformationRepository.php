<?php

namespace App\Repository;

use App\Entity\Restoinformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Restoinformation>
 *
 * @method Restoinformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restoinformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restoinformation[]    findAll()
 * @method Restoinformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestoinformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restoinformation::class);
    }

    //    /**
    //     * @return Restoinformation[] Returns an array of Restoinformation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Restoinformation
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
