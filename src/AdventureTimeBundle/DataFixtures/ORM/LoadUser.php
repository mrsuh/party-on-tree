<?php namespace AdventureTimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AdventureTimeBundle\Entity\User;
use AdventureTimeBundle\Entity\Role;
use AdventureTimeBundle\Entity\Personage;
use AdventureTimeBundle\Entity\Code;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // создание роли ROLE_ADMIN
        $role = new Role();
        $role->setName('ROLE_USER');
        $manager->persist($role);

        // создание пользователя
        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@mail.ru');
        $user->setSalt(md5(time()));

        // шифрует и устанавливает пароль для пользователя,
        // эти настройки совпадают с конфигурационными файлами
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('user', $user->getSalt());
        $user->setPassword($password);

        $user->setRoles($role);

        // создание роли ROLE_ADMIN
        $role = new Role();
        $role->setName('ROLE_ADMIN');
        $manager->persist($role);

        $manager->persist($user);
        $manager->flush();

        // создание пользователя
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@mail.ru');
        $user->setSalt(md5(time()));

        // шифрует и устанавливает пароль для пользователя,
        // эти настройки совпадают с конфигурационными файлами
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);

        $user->setRoles($role);

        $manager->persist($user);
        $manager->flush();

        $code = new Code();
        $code->setCode('code');
        $code->setIsValid(true);

        $manager->persist($code);
        $manager->flush();


    }

}