<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfessorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProfessorRepository::class)
 */
class Professor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="integer")
     */
    private $arrived_year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getArrivedYear(): ?int
    {
        return $this->arrived_year;
    }

    public function setArrivedYear(int $arrived_year): self
    {
        $this->arrived_year = $arrived_year;

        return $this;
    }

	/**
	 * @param string $lastName
	 * @param string $firstName
	 * @param int $arrivedYear
	 * @return $this
	 */
	public function createProfessor(string $lastName, string $firstName, int $arrivedYear): Professor {

		$this->setLastName($lastName);
		$this->setFirstName($firstName);
		$this->setArrivedYear($arrivedYear);

    	return $this;
	}
}
