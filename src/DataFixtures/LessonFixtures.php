<?php

namespace App\DataFixtures;

use App\Entity\Lesson;
use App\Repository\GradeRepository;
use App\Repository\ProfessorRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LessonFixtures extends Fixture implements DependentFixtureInterface
{
	/** @var GradeRepository */
	private $gradeRepository;

	/** @var ProfessorRepository */
	private $professorRepository;

	public function __construct(GradeRepository $gradeRepository, ProfessorRepository $professorRepository){
		$this->gradeRepository = $gradeRepository;
		$this->professorRepository = $professorRepository;
	}

    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create();
		$grades = $this->gradeRepository->findLast(5);
		$professors = $this->professorRepository->findLast(5);

		for ($i = 0; $i < 5; $i++) {
			$randomDate = rand( strtotime("01/01/2021"), time() );
			$randomDays = rand(1,5);

			$start_date = new DateTime();
			$start_date->setTimestamp($randomDate);
			$end_date = clone $start_date;
			$end_date->modify('+'. $randomDays .' days');


			$lesson = new Lesson();
			$lesson->createLesson(
				$faker->word,
				$start_date,
				$end_date,
				$professors[$i],
				$grades[$i]
			);

			$manager->persist($lesson);
		}
		$manager->flush();
    }

	public function getDependencies(): array {
		return  [
			GradeFixtures::class,
			ProfessorFixtures::class,
		];
	}
}
