<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function TestAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $answers = $request->request->get('answer');
            if($answers) {
                $personage = $this->get('model.question')->processAnswers($answers);

                return $this->redirect($this->generateUrl('personage', array('personage' => $personage)));
            }


        }


        return $this->render('AdventureTimeBundle:Test:test.html.twig', array('questions' => $this->get('model.question')->getQuestions()));
    }
}
