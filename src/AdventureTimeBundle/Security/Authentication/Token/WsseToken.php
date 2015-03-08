<?php namespace AdventureTimeBundle\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class WsseToken extends AbstractToken
{
    public $pass;

    public function __construct(array $roles = array())
    {
        parent::__construct($roles);
        $this->setAuthenticated(count($roles) > 0);
    }

    public function getCredentials()
    {
        return '';
    }
}