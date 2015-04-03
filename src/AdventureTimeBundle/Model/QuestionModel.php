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

        $total = count($questions);
        foreach($questions as $q) {
            $answers = $this->em->getRepository('AdventureTimeBundle:Answer')->findByQuestion($q);
            $data[$count] = array(
                'question' => $q->getName(),
                'total' => $total,
            );

            foreach ($answers as $a) {
                $data[$count]['answer'][] = array(
                    'name' =>$a->getName(),
                    'id' => $a->getId(),
                );
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

        asort($personages);
        $personage = null;
        foreach($personages as $key => $val) {
            $pers = $this->em->getRepository('AdventureTimeBundle:Personage')->findOneById($key);
            if(!$pers->getActive()) {
                $personage = $pers;
                break;
            }
        }

        return $personage->getName();
    }

}