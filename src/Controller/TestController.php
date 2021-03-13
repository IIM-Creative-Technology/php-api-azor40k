<?php

namespace App\Controller;

use App\Repository\GradeRepository;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
	/** @var GradeRepository */
	private $gradeRepository;

	public function __construct(GradeRepository $gradeRepository){
		$this->gradeRepository = $gradeRepository;
	}

	/**
	 * @Route("/test", name="test")
	 * @throws Exception
	 */
    public function index(): Response
    {
    	$res = [

		];
        return $this->render('test/index.html.twig', $res );
    }
}
