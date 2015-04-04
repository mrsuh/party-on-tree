<?php namespace AdventureTimeBundle\Security\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use AdventureTimeBundle\Security\Authentication\Token\WsseToken;


class WsseProvider implements AuthenticationProviderInterface
{
    private $userProvider;
    private $cacheDir;
    private $session;

    public function __construct(UserProviderInterface $userProvider, $cacheDir, $session)
    {
        $this->userProvider = $userProvider;
        $this->cacheDir = $cacheDir;
        $this->session = $session;
    }

    public function authenticate(TokenInterface $token)
    {
        $user = $this->userProvider->loadUserByUsername($token->getUsername());
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        if ($encoder->isPasswordValid($user->getPassword(), $token->pass, $user->getSalt())) {
            $authenticatedToken = new WsseToken(array($user->getRoles()->getName()));
            $authenticatedToken->setUser($user->getUsername());
            $this->session->set('username', $token->getUsername());
            return $authenticatedToken;
        }

        throw new AuthenticationException('The WSSE authentication failed.');
    }

    public function supports(TokenInterface $token)
    {
        return $token instanceof WsseToken;
    }
}