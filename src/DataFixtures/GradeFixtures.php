<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GradeFixtures extends Fixture
{
	public function load(ObjectManager $manager)
    {
		for ($i = 1; $i < 6; $i++) {
			$grade = new Grade();
			$grade->createGrade(
				'A'. $i,
				2026 - $i
			);

			$manager->persist($grade);
		}

		$manager->flush();
    }
}
