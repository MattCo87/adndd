<?php

namespace App\Repository;

use App\Entity\Gamerules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gamerules|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gamerules|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gamerules[]    findAll()
 * @method Gamerules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamerulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gamerules::class);
    }

    // /**
    //  * @return Gamerules[] Returns an array of Gamerules objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gamerules
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
