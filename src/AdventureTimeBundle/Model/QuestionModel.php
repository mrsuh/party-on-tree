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

        foreach($questions as $q) {
            $answers = $this->em->getRepository('AdventureTimeBundle:Answer')->findByQuestion($q);
            $question = $q->getName();

            foreach ($answers as $a) {
                $data[$question][$a->getId()] = $a->getName();
            }

        }

        return $data;
    }

}