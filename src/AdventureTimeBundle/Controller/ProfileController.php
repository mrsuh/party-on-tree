<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function profileAction()
    {
        return $this->render('AdventureTimeBundle:Profile:profile.html.twig');
    }
}
