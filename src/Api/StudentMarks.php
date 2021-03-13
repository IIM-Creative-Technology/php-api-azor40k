<?php


namespace App\Api;

use App\Entity\Student;
use App\Repository\MarkRepository;

class StudentMarks {
	
	/** @var \App\Repository\MarkRepository  */
	private $markRepository;
	
	public function __construct(MarkRepository $markRepository) {
		$this->markRepository = $markRepository;
	}
	
	/**
	 * Return all Marks that a Student have
	 *
	 * @param Student $data
	 * @return mixed
	 */
	public function __invoke(Student $data) {
		return $this->markRepository->findMarksByStudent($data->getId());
	}
	
}