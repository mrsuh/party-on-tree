<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;

class ProfileModel
{

    private $em;
    private $userModel;

    public function __construct($em, $userModel)
    {
        $this->em = $em;
        $this->userModel = $userModel;
    }

    public function hasUserPersonage()
    {
        $user = $this->userModel->getUser();

        return !is_null($user->getPersonage());
    }


}