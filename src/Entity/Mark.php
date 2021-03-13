<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MarkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MarkRepository::class)
 * @UniqueEntity(
 *     fields={"student", "lesson"},
 *     errorPath="student",
 *     message="This student has already a mark on this lesson."
 * )
 */
class Mark
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
	 * @Assert\Range(
	 *      min = 0,
	 *      max = 20,
	 *      notInRangeMessage = "A mark must be between {{ min }} and {{ max }} /20 to be registered",
	 * )
     */
    private $mark;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="marks")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Lesson::class, inversedBy="marks")
     */
    private $lesson;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?float
    {
        return $this->mark;
    }

    public function setMark(float $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }

	/**
	 * @param float $mark
	 * @param Student $student
	 * @param Lesson $lesson
	 * @return $this
	 */
	public function createMark(float $mark, Student $student, Lesson $lesson): Mark {
		$this->setMark($mark);
		$this->setStudent($student);
		$this->setLesson($lesson);
    	return $this;
	}
}
