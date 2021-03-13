<?php

namespace App\Repository;

use App\Entity\Professor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Professor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professor[]    findAll()
 * @method Professor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professor::class);
    }
	
	/**
	 * @param int $max
	 * @return int|mixed|string
	 */
	public function findLast(int $max)
	{
		return $this->createQueryBuilder('p')
		            ->orderBy("p.id", "DESC")
		            ->setMaxResults($max)
		            ->getQuery()
		            ->getResult()
			;
	}
}
