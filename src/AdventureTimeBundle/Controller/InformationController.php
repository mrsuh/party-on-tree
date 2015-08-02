<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InformationController extends Controller
{
    public function informationAction()
    {
        return $this->render('AdventureTimeBundle:Information:information.html.twig');
    }
}
