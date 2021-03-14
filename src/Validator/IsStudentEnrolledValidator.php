<?php


namespace App\Validator;


use App\Entity\Mark;
use Symfony\Component\HttpFoundation\File\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class IsStudentEnrolledValidator extends ConstraintValidator {
	
	/**
	 * @param mixed                                   $value
	 * @param \Symfony\Component\Validator\Constraint $constraint
	 */
	public function validate($value, Constraint $constraint): void
	{
		if (!$constraint instanceof Mark) {
			throw new UnexpectedTypeException($constraint, Mark::class);
		}
		
		if (null === $value || '' === $value) {
			return;
		}
		
		/**
		 * @var Mark $mark
		 */
		$mark = $value;
		
		if($mark){
			$student = $mark->getStudent();
			$studentGrade = $student->getGrade();
			$lesson = $mark->getLesson();
			$grade = $lesson->getGrade();
			
			if($studentGrade !== $grade){
				$this->context->buildViolation($constraint->message)->addViolation();
			}
		}
		
	}
}