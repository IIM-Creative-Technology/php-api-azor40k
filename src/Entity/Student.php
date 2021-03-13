<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student {
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
	private $firstName;

	/**
	 * @ORM\Column(type="integer")
	 * @Assert\Range(
	 *      min = 14,
	 *      max = 29,
	 *      notInRangeMessage = "Student must be between {{ min }} and {{ max }}years old to be registered",
	 * )
	 */
	private $age;

	/**
	 * @ORM\Column(type="integer")
	 * @Assert\LessThanOrEqual(2021)
	 */
	private $arrived_year;

	/**
	 * @ORM\ManyToOne(targetEntity=Grade::class, inversedBy="students")
	 * @ORM\JoinColumn(onDelete="SET NULL")
	 */
	private $grade;

	/**
	 * @ORM\OneToMany(targetEntity=Mark::class, mappedBy="student")
	 */
	private $marks;

	public function __construct() {
		$this->marks = new ArrayCollection();
	}


	public function getId(): ?int {
		return $this->id;
	}

	public function getLastName(): ?string {
		return $this->lastName;
	}

	public function setLastName(string $lastName): self {
		$this->lastName = $lastName;

		return $this;
	}

	public function getFirstName(): ?string {
		return $this->firstName;
	}

	public function setFirstName(string $firstName): self {
		$this->firstName = $firstName;

		return $this;
	}

	public function getAge(): ?int {
		return $this->age;
	}

	public function setAge(int $age): self {
		$this->age = $age;

		return $this;
	}

	public function getArrivedYear(): ?int {
		return $this->arrived_year;
	}

	public function setArrivedYear(int $arrived_year): self {
		$this->arrived_year = $arrived_year;

		return $this;
	}

	public function getGrade(): ?Grade {
		return $this->grade;
	}

	public function setGrade(?Grade $grade): self {
		$this->grade = $grade;

		return $this;
	}

	/**
	 * @return Collection|Mark[]
	 */
	public function getMarks(): Collection {
		return $this->marks;
	}

	public function addMark(Mark $mark): self {
		if (!$this->marks->contains($mark)) {
			$this->marks[] = $mark;
			$mark->setStudent($this);
		}

		return $this;
	}

	public function removeMark(Mark $mark): self {
		if ($this->marks->removeElement($mark)) {
			// set the owning side to null (unless already changed)
			if ($mark->getStudent() === $this) {
				$mark->setStudent(null);
			}
		}

		return $this;
	}

	/**
	 * @param string $lastName
	 * @param string $firstName
	 * @param int $age
	 * @param int $arrivedYear
	 * @param Grade $grade
	 * @return $this
	 */
	public function createStudent(string $lastName, string $firstName, int $age, int $arrivedYear, Grade $grade): Student {

		$this->setLastName($lastName);
		$this->setFirstName($firstName);
		$this->setAge($age);
		$this->setArrivedYear($arrivedYear);
		$this->setGrade($grade);
		return $this;
	}

}
