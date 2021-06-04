<?php

namespace App\Repository;

use App\Entity\MailAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MailAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailAddress[]    findAll()
 * @method MailAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailAddress::class);
    }

    // /**
    //  * @return MailAddress[] Returns an array of MailAddress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MailAddress
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
