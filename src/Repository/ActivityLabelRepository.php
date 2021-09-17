<?php

namespace App\Repository;

use App\Entity\ActivityLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActivityLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityLabel[]    findAll()
 * @method ActivityLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityLabelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityLabel::class);
    }

    // /**
    //  * @return ActivityLabel[] Returns an array of ActivityLabel objects
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
    public function findOneBySomeField($value): ?ActivityLabel
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
