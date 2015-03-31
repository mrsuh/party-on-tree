<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{
    public function ajaxGetQuestionsAction()
    {
        $serializer = $this->container->get('serializer');
        return new Response($serializer->serialize($this->get('model.question')->getQuestions(), 'json'));
    }

    public function ajaxGetAnswersAction(Request $request)
    {
        $serializer = $this->container->get('serializer');
//        $this->get('model.question')->processAnswers($request->request->get('answers'));
        return new Response($serializer->serialize($this->get('model.question')->processAnswers($request->request->get('answers')), 'json'));
    }
}
