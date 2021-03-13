<?php

namespace App\DataFixtures;

use App\Entity\Professor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProfessorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create();

		for ($i = 0; $i < 5; $i++) {
			$professor = new Professor();
			$professor->createProfessor(
				$faker->lastName,
				$faker->firstName,
				rand(2014,2021)
			);

			$manager->persist($professor);
		}
		$manager->flush();
    }
}
