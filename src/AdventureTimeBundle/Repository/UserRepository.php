<?php

namespace Artvisio\DockerBillingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AdventureTimeBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class DiscountRepository extends EntityRepository
{
    public function createUser($data)
    {
        $role = $this->_em->getRepository('AdventureTimeBundle:Role')->findOneByName($data['role']);

        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setSalt(md5(time()));

        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($data['password'], $user->getSalt());
        $user->setPassword($password);
        $user->setRoles($role);

        $this->_em->persist($user);

        return Constants::OK;
    }
}
