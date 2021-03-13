<?php


namespace App\Api;

use App\Entity\Grade;
use App\Repository\StudentRepository;

class GradeStudents {
	
	/** @var StudentRepository  */
	private $studentRepository;
	
	public function __construct(StudentRepository $studentRepository) {
		$this->studentRepository = $studentRepository;
	}
	
	/**
	 * Return all Students that have the same Grade
	 *
	 * @param Grade $data
	 * @return mixed
	 */
	public function __invoke(Grade $data) {
		return $this->studentRepository->findStudentsByGrade($data->getId());
	}
	
}