<?php

namespace App\Repository;

use App\Entity\Equipmenttype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipmenttype|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipmenttype|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipmenttype[]    findAll()
 * @method Equipmenttype[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmenttypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipmenttype::class);
    }

    // /**
    //  * @return Equipmenttype[] Returns an array of Equipmenttype objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Equipmenttype
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
