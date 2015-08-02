<?php namespace AdventureTimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdventureTimeBundle\Entity\Code;

class LoadCodes extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->container->getParameter('codes') as $id => $data) {
            $code = new Code();
            $code
                ->setCode($data)
                ->setIsValid(true)
            ;
            $manager->persist($code);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }

}