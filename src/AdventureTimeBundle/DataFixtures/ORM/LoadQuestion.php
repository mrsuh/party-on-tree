<?php namespace AdventureTimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AdventureTimeBundle\Entity\Answer;
use AdventureTimeBundle\Entity\Question;
use AdventureTimeBundle\Entity\Conformity;

class LoadQuestion extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        foreach ($this->container->getParameter('questions') as $q) {
            $question = new Question();
            $question->setName($q['question']);
            $manager->persist($question);

            foreach($q['answer'] as $a) {
                $answer = new Answer();
                $answer->setName($a['name']);
                $answer->setQuestion($question);
                $manager->persist($answer);

                foreach($a['personage'] as $p) {
                    $personage = $manager->getRepository('AdventureTimeBundle:Personage')->findOneByName($p);
                    $confirmity = new Conformity();
                    $confirmity->setAnswer($answer);
                    $confirmity->setPersonage($personage);
                    $manager->persist($confirmity);
                }
            }

        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}