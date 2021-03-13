<?php

namespace App\DataFixtures;

use App\Entity\Mark;
use App\Repository\LessonRepository;
use App\Repository\StudentRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MarkFixtures extends Fixture implements DependentFixtureInterface
{
	/** @var LessonRepository */
	private $lessonRepository;

	/** @var StudentRepository */
	private $studentRepository;

	public function __construct(LessonRepository $lessonRepository, StudentRepository $studentRepository){
		$this->lessonRepository = $lessonRepository;
		$this->studentRepository = $studentRepository;
	}

    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create();
		$lessons = $this->lessonRepository->findLast(5);
		$students = $this->studentRepository->findLast(100);

		foreach ($lessons as $lesson){
			foreach ($students as $student){
				$mark = new Mark();
				$mark->createMark(
					$faker->randomFloat(2, 0 , 20),
					$student,
					$lesson
				);
				$manager->persist($mark);
			}
		}
		$manager->flush();
    }

	public function getDependencies(): array {
		return  [
			LessonFixtures::class,
			StudentFixtures::class,
		];
	}
}