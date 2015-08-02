<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function defaultPageAction()
    {
        return $this->redirect($this->generateUrl('personages'));
    }
}
