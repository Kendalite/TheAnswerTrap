<?php

namespace App\Repository;

use App\Entity\Trap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trap>
 *
 * @method Trap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trap[]    findAll()
 * @method Trap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trap::class);
    }

//    /**
//     * @return Trap[] Returns an array of Trap objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Trap
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
