<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdventureTimeBundle:Default:index.html.twig');
    }

    public function userAction()
    {
        return $this->render('AdventureTimeBundle:Default:user.html.twig');
    }

    public function adminAction()
    {
        return $this->render('AdventureTimeBundle:Default:admin.html.twig');
    }

    public function defaultAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirect($this->generateUrl('admin'));
        } else if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('user'));
        }
    }
}
