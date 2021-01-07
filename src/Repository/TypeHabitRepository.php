<?php

namespace App\Repository;

use App\Entity\TypeHabit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeHabit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHabit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHabit[]    findAll()
 * @method TypeHabit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHabitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHabit::class);
    }

    // /**
    //  * @return TypeHabit[] Returns an array of TypeHabit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeHabit
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
