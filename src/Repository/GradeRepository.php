<?php

namespace App\Repository;

use App\Entity\Grade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grade[]    findAll()
 * @method Grade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grade::class);
    }
	
	/**
	 * @param int $max
	 * @return int|mixed|string
	 */
	public function findLast(int $max)
	{
		return $this->createQueryBuilder('g')
		            ->orderBy("g.id", "DESC")
		            ->setMaxResults($max)
		            ->getQuery()
		            ->getResult()
			;
	}
	
}
