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

    public function getPersonageAction($id)
    {

    }

}