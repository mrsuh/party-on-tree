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
}
