<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;
use AdventureTimeBundle\Security\Authentication\Token\WsseToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class SecurityModel
{

    protected $tokenStorage;
    protected $em;
    protected $userModel;
    protected $mailModel;

    public function __construct($tokenStorage, $em, $userModel, $mailModel)
    {
        $this->tokenStorage = $tokenStorage;
        $this->em = $em;
        $this->userModel = $userModel;
        $this->mailModel = $mailModel;
    }

    public function registration($data)
    {
        try {
            $this->em->getConnection()->beginTransaction();
            if ($this->userModel->isUserExist($data['username'])) {
                return false;
            }
            $this->userModel->createUser($data);
            $this->authorize($data['username'], $data['role']);
            $this->em->flush();
            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->getConnection()->rollback();
            throw new \Exception(__FUNCTION__ . ': ' . $e->getMessage());
        }

        return true;
    }

    public function isValidCode($data)
    {
        $out = false;
        $code = $this->em->getRepository('AdventureTimeBundle:Code')->findOneByCode($data);
        if ($code) {
            $out = (bool)$code->getIsValid();
        }

        return $out;
    }

    public function setUnValidCode($data)
    {
        $code = $this->em->getRepository('AdventureTimeBundle:Code')->findOneByCode($data);
        $code->setIsValid(false);
        $this->em->commit();
    }

    public function authorize($user, $role)
    {
        $token = new WsseToken(array($role));
        $token->setUser($user);
        $this->tokenStorage->setToken($token);

    }

    public function generateNewPassword($user)
    {
        if (!$this->userModel->isUserExist($user)) {
            throw new \Exception(__FUNCTION__ . ' USER_NOT_EXIST');
        }

        $user = $this->em->getRepository('AdventureTimeBundle:User')->findOneByUsername($user);
        $pass = $this->generatePassword();
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($pass, $user->getSalt());
        $user->setPassword($password);
        $this->em->flush();

        return $pass;
    }

    function generatePassword($length = Constants::PASSWORD_LENGTH)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }

        return $string;
    }

}