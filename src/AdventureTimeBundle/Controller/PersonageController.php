<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PersonageController extends Controller
{
    public function personageAction(Request $request)
    {
        $personage = $request->query->get('personage');

        return $this->render('AdventureTimeBundle:Personage:personage.html.twig', array('personage' => $personage));
    }

    public function personagesAction()
    {
        $personages = $this->get('model.personage')->getPersonages();

        return $this->render('AdventureTimeBundle:Personage:personages.html.twig', array('personages' => $personages));
    }
}
