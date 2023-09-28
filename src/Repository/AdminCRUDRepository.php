<?php

namespace App\Repository;

use App\Entity\AdminCRUD;
use App\Entity\User;
use App\Entity\Langages;
use App\Entity\Cours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdminCRUD>
 *
 * @method AdminCRUD|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminCRUD|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminCRUD[]    findAll()
 * @method AdminCRUD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminCRUDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
        // parent::__construct($registry, Langages::class);
        // parent::__construct($registry, Cours::class);
    }

//    /**
//     * @return AdminCRUD[] Returns an array of AdminCRUD objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdminCRUD
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
