<?php namespace AdventureTimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdventureTimeBundle\Entity\Personage;

class LoadPersonage extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->container->getParameter('characters') as $id => $data) {
            $personage = new Personage();
            $personage
                ->setName($data['name'])
                ->setSex($data['sex'])
                ->setNameRussian($data['name_ru'])
                ->setActive(false)
                ->setAge($data['age'])
                ->setRace($data['race'])
            ;
            $manager->persist($personage);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}