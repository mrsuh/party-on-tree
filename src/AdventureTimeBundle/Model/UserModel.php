<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;
use AdventureTimeBundle\Entity\User;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class UserModel
{

    private $em;
    private $securityContext;

    public function __construct($em, $securityContext)
    {
        $this->em = $em;
        $this->securityContext;
    }

    public function createUser($data)
    {
        if ($this->isUserExist($data['username'])) {
            throw new \Exception(__FUNCTION__ . ' USER_EXIST');
        }
        $role = $this->em->getRepository('AdventureTimeBundle:Role')->findOneByName($data['role']);

        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setSalt(md5(time()));

        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($data['password'], $user->getSalt());
        $user->setPassword($password);
        $user->setRoles($role);

        $this->em->persist($user);

        return Constants::OK;
    }

    public function isUserExist($username)
    {
        return (bool)$this->em->getRepository('AdventureTimeBundle:User')->findOneByUsername($username);
    }

    public function setPersonageToUser($personage)
    {
        $username= $this->securityContext->getToken()->getUser()->getUsername();
        $user = $this->em->getRepository('AdventureTimeBundle:User')->findOneByUsername($username);
        $user->setPersonage($personage);
        $personage = $this->em->getRepository('AdventureTimeBundle:Personage')->findOne($personage);
        $personage->setActive(true);
        $this->em->flush();
    }
}