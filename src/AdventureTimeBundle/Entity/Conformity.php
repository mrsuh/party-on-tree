<?php

namespace AdventureTimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conformity
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Conformity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\AdventureTimeBundle\Entity\Answer")
     * @ORM\JoinColumn(name="answer", referencedColumnName="id")
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\AdventureTimeBundle\Entity\Personage")
     * @ORM\JoinColumn(name="personage", referencedColumnName="id")
     */
    private $personage;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Conformity
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set personage
     *
     * @param string $personage
     * @return Conformity
     */
    public function setPersonage($personage)
    {
        $this->personage = $personage;

        return $this;
    }

    /**
     * Get personage
     *
     * @return string 
     */
    public function getPersonage()
    {
        return $this->personage;
    }
}
