<?php namespace AdventureTimeBundle\Model;

use AdventureTimeBundle\Constants;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class PersonageModel
{

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getPersonages()
    {
        $personages = $this->em->getRepository('AdventureTimeBundle:Personage')->findAll();
        $data = array();
        foreach($personages as $p) {
            $data[] = array(
                'img' => $p->getName(),

            );
        }

        return $data;
    }

}