<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonageController extends Controller
{
    public function personageAction($id)
    {
        return $this->render('AdventureTimeBundle:Personage:personage.html.twig');
    }

    public function personagesAction()
    {
        return $this->render('AdventureTimeBundle:Personage:personages.html.twig');
    }
}
