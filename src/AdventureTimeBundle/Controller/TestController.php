<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function TestAction()
    {
        return $this->render('AdventureTimeBundle:Test:test.html.twig');
    }
}
