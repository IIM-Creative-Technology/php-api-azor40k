<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsStudentEnrolled extends Constraint {
	
	public string $message = "Can't add mark, this student is not enrolled is this lesson.";
	
	public function validatedBy() : string {
		return \get_class($this).'Validator';
	}
}