<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }

     /**
      * @return Bien[] Returns an array of Bien objects
      */
    public function findByExampleField(): array
    {
        $value='id';
        return $this->createQueryBuilder('b')
            ->andWhere('b.id = :id')
            ->setParameter('id', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField(): ?Bien
    {
        $value='titre';
        return $this->createQueryBuilder('b')
            ->andWhere('b.titre = :titre')
            ->setParameter('titre', '%'.$value.'%')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return int|mixed|string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countAllBien()
    {
       $queryBuilder = $this->createQueryBuilder('b');
       $queryBuilder->select('COUNT(b.id) as value');

       return  $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
