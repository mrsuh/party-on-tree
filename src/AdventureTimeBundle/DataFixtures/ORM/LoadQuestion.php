<?php namespace AdventureTimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdventureTimeBundle\Entity\Answer;
use AdventureTimeBundle\Entity\Question;

class LoadQuestion extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $question = new Question();
        $question->setName('Question');
        $manager->persist($question);

        $answer = new Answer();
        $answer->setName('question');
        $answer->setMind(1);
        $answer->setQuestion($question);
        $manager->persist($answer);


        $manager->flush();

        foreach ($this->container->getParameter('questions') as $id => $data) {
            $question = new Question();
            $question->setName('Question');
            $manager->persist($data['name']);

        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}