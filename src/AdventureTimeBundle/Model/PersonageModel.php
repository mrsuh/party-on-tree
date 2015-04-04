<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class PersonageModel
{

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getPersonages()
    {
        return $this->em->getRepository('AdventureTimeBundle:Personage')->findAll();

    }

    public function getPersonageById($id)
    {
        return $this->em->getRepository('AdventureTimeBundle:Personage')->findOneById($id);
    }

}