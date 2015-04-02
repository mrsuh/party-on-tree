<?php namespace AdventureTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use AdventureTimeBundle\Constants;
use AdventureTimeBundle\Form\Security\RegistrationForm;
use AdventureTimeBundle\Form\Security\RememberPassForm;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
            $authenticationUtils = $this->get('security.authentication_utils');
            $lastUsername = $authenticationUtils->getLastUsername();
            $this->get('session')->remove(Security::AUTHENTICATION_ERROR);

            return $this->render('AdventureTimeBundle:Security:login.html.twig', array('last_username' => $lastUsername, 'error' => true,));

        } else {

           if ($this->get('security.authorization_checker')->isGranted(Constants::ROLE_USER)) {
                return $this->redirect($this->generateUrl('user'));
            }

            return $this->render('AdventureTimeBundle:Security:login.html.twig', array('last_username' => null, 'error' => false,));
        }

    }

    public function registrationAction(Request $request)
    {
        $form = $this->createForm(new RegistrationForm());

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $formData = $form->getData();
            $formData['role'] = Constants::ROLE_USER;
            if ($this->get('model.security')->registration($formData)) {
                $data = array('subject' => 'Registration', 'mail' => $formData['email'], 'body' => $this->renderView('AdventureTimeBundle:Mail:registration.html.twig', array('username' => $formData['username'], 'pass' => $formData['password'])),);
                $this->get('model.mail')->sendMail($data);
                return $this->redirect($this->generateUrl('profile'));

            } else {
                return $this->render('AdventureTimeBundle:Security:registration.html.twig', array('form' => $form->createView(), 'error' => true,));
            }
        }

        return $this->render('AdventureTimeBundle:Security:registration.html.twig', array('form' => $form->createView(), 'error' => false,));
    }

    public function rememberPassAction(Request $request)
    {
        $form = $this->createForm(new RememberPassForm());

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $formData = $form->getData();
            $username = $formData['username'];
            if ($password = $this->get('model.security')->generateNewPassword($username)) {
                $data = array('subject' => 'Generate new pass', 'mail' => $username, 'body' => $this->renderView('AdventureTimeBundle:Mail:remember_pass.html.twig', array('username' => $username, 'pass' => $password)),);
                $this->get('model.mail')->sendMail($data);

                return $this->redirect($this->generateUrl('user'));
            } else {
                return $this->render('AdventureTimeBundle:Security:remember_pass.html.twig', array('form' => $form->createView(), 'error' => true,));
            }
        }

        return $this->render('AdventureTimeBundle:Security:remember_pass.html.twig', array('form' => $form->createView(), 'error' => false,));
    }
}
