<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function profileAction()
    {
        $username = $this->get('session')->get('username');
        return $this->render('AdventureTimeBundle:Profile:profile.html.twig', array('username'=> $username));
    }
}
