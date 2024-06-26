<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Fooditem;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    public function findByTypeStart(): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id','f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->setParameter('type', 'start')
            ->getQuery()
            ->getResult();
    }
    
    public function findByTypeStartAndUser(User $user): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->andWhere('f.user = :user')
            ->setParameter('type', 'start')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function findByTypeBreakfastAndUser(User $user): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->andWhere('f.user = :user')
            ->setParameter('type', 'breakfast')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }


    public function findByTypeLunchAndUser(User $user): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->andWhere('f.user = :user')
            ->setParameter('type', 'lunch')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function findByTypeDinnerAndUser(User $user): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id', 'f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->andWhere('f.user = :user')
            ->setParameter('type', 'dinner')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
    
    public function findByTypeBreakfast(): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id','f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->setParameter('type', 'breakfast')
            ->getQuery()
            ->getResult();
    }

    public function findByTypeLunch(): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id','f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->setParameter('type', 'lunch')
            ->getQuery()
            ->getResult();
    }

    public function findByTypeDinner(): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.id','f.photo', 'f.nameFood', 'f.price', 'f.description')
            ->where('f.type = :type')
            ->setParameter('type', 'dinner')
            ->getQuery()
            ->getResult();
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
