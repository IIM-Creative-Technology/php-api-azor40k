<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
	/**
	 * @Route("/students/{id}/marks", name="student_marks", methods={"GET"})
	 * @param $id
	 * @return JsonResponse
	 */
    public function studentMarks($id): JsonResponse {
    	return new JsonResponse(['id' => $id ]);
    }
}
