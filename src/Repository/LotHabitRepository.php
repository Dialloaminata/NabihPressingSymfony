<?php

namespace App\Repository;

use App\Entity\LotHabit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LotHabit|null find($id, $lockMode = null, $lockVersion = null)
 * @method LotHabit|null findOneBy(array $criteria, array $orderBy = null)
 * @method LotHabit[]    findAll()
 * @method LotHabit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotHabitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LotHabit::class);
    }

    // /**
    //  * @return LotHabit[] Returns an array of LotHabit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LotHabit
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
