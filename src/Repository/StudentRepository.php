<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }
	
	/**
	 * @param int $max
	 * @return int|mixed|string
	 */
	public function findLast(int $max)
	{
		return $this->createQueryBuilder('s')
		            ->orderBy("s.id", "DESC")
		            ->setMaxResults($max)
		            ->getQuery()
		            ->getResult()
			;
	}
	
	/**
	 * @param int $grade
	 * @return int|mixed|string
	 */
    public function findStudentsByGrade(int $grade)
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.grade', 'g')
            ->andWhere('g.id = :grade')
            ->setParameter('grade', $grade)
            ->getQuery()
            ->getResult()
        ;
    }

}
