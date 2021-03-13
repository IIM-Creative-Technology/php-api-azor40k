<?php

namespace App\Repository;

use App\Entity\Mark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mark|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mark|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mark[]    findAll()
 * @method Mark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mark::class);
    }
	
	/**
	 * @param int $student
	 * @return int|mixed|string
	 */
	public function findMarksByStudent(int $student)
	{
		return $this->createQueryBuilder('m')
		            ->innerJoin('m.student', 's')
		            ->andWhere('s.id = :student')
		            ->setParameter('student', $student)
		            ->getQuery()
		            ->getResult()
			;
	}
}
