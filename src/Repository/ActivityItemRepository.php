<?php

namespace App\Repository;

use App\Entity\ActivityItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActivityItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityItem[]    findAll()
 * @method ActivityItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityItem::class);
    }

    // /**
    //  * @return ActivityItem[] Returns an array of ActivityItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActivityItem
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
