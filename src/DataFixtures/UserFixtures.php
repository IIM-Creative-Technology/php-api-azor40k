<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture {
	
	/** @var UserRepository */
	private $userRepository;
	
	/** @var UserPasswordEncoderInterface */
	private $passwordEncoder;
	
	public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder){
		$this->userRepository = $userRepository;
		$this->passwordEncoder = $passwordEncoder;
	}
	
	public function load(ObjectManager $manager) {
		$faker = Factory::create();
		$usersDb = $this->userRepository->findAll();
		$users = $this->adminUsers();
		
		for($i = 0; $i < 3; $i++) {
			$user = new User();
			$user->createUser(
				$email      = empty($usersDb) ? $users[$i]['email']     : $faker->safeEmail,
				$this->passwordEncoder->encodePassword($user, 'password'),
				$lastName   = empty($usersDb) ? $users[$i]['lastName']  : $faker->lastName,
				$firstName  = empty($usersDb) ? $users[$i]['firstName'] : $faker->firstName
			);
			
			$manager->persist($user);
		}
		
		$manager->flush();
	}
	
	/**
	 * @return \string[][]
	 */
	public function adminUsers() : array {
		return [
			0 => [
				'email'     =>  'karine.mousdik@devinci.fr',
				'lastName'  => 'Mousdik',
				'firstName' => 'Karine',
			],
			1 => [
				'email'     => 'alexis.bougy@devinci.fr',
				'lastName'  => 'Bougy',
				'firstName' => 'Alexis',
			],
			2 => [
				'email'     => 'nicolas.rauber@devinci.fr',
				'lastName'  => 'Rubber',
				'firstName' => 'Nicolas',
			]
		];
	}
}
