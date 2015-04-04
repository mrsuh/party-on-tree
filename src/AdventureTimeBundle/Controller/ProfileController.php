<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function profileAction()
    {

        $user = $this->get('model.user')->getUser();

        return $this->render('AdventureTimeBundle:Profile:profile.html.twig', array('user'=> $user ));
    }
}
