<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class QuestionModel
{

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getQuestions()
    {
        $data = array();
        $questions = $this->em->getRepository('AdventureTimeBundle:Question')->findAll();
        $count = 1;
        foreach($questions as $q) {
            $answers = $this->em->getRepository('AdventureTimeBundle:Answer')->findByQuestion($q);
            $data[$count]['question'] = $q->getName();

            foreach ($answers as $a) {
                $data[$count]['answer'][$a->getId()] = $a->getName();
            }
            $count++;

        }

        return $data;
    }

    public function processAnswers($answers)
    {
        $personages = array();
        foreach($answers as $id) {
            $conformity = $this->em->getRepository('AdventureTimeBundle:Conformity')->findByAnswer($id);
            foreach($conformity as $c) {
                $id = $c->getPersonage()->getId();
                if(isset($personages[$id])) {
                    $personages[$id] += 1;
                } else {
                    $personages[$id] = 1;
                }

            }
        }

        assort($personages);
        $personage = null;
        foreach($personages as $p) {
            $pers = $this->em->getRepository('AdventureTimeBundle:Personage')->findOneById($p);
            if(!$pers->getAcive()) {
                $personage = $pers;
                break;
            }
        }

        return $personage;
    }

}