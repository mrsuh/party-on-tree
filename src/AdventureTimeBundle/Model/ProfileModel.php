<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;

class ProfileModel
{

    private $em;
    private $securityContext;

    public function __construct($em, $securityContext)
    {
        $this->em = $em;
        $this->securityContext;
    }

}