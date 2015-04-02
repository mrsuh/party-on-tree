<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;

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

        $this->em->getRepository('AdventureTimeBundle:User')->createUser($data);

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