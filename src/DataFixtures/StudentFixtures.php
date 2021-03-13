<?php

namespace App\DataFixtures;

use App\Entity\Student;
use App\Repository\GradeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StudentFixtures extends Fixture implements DependentFixtureInterface
{
	/** @var GradeRepository */
	private $gradeRepository;

	public function __construct(GradeRepository $gradeRepository){
		$this->gradeRepository = $gradeRepository;
	}

    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create();
    	$grades = $this->gradeRepository->findLast(5);

		for ($i = 0; $i < 100; $i++) {
			$student = new Student();
			$student->createStudent(
				$faker->lastName,
				$faker->firstName,
				rand(14,29),
				rand(2014,2021),
				$grades[rand(0,4)]
			);

			$manager->persist($student);
		}
		$manager->flush();
    }

	public function getDependencies(): array {
		return  [
			GradeFixtures::class
		];
	}
}
