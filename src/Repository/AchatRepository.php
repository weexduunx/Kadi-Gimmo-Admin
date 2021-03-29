<?php

namespace App\Repository;

use App\Entity\Achat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Achat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Achat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Achat[]    findAll()
 * @method Achat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Achat::class);
    }

     /**
     * @return Achat[] Returns an array of Achat objects
     */
    public function findByExampleField(): array
    {
        $value = "id";
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', '%'.$value.'%')
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField(): ?Achat
    {
        $value = "titre";
        return $this->createQueryBuilder('a')
            ->andWhere('a.titre = :titre')
            ->setParameter('titre','%'.$value.'%')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return int|mixed|string
     */
    public function countAllAchat()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id) as value');

        return  $queryBuilder->getQuery()->getResult();
    }
}
