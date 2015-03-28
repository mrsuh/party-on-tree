<?php

namespace AdventureTimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Answer
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
     * @ORM\ManyToOne(targetEntity="\AdventureTimeBundle\Entity\Question")
     * @ORM\JoinColumn(name="question", referencedColumnName="id")
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="mind", type="integer", nullable=true)
     */
    private $mind;

    /**
     * @var integer
     *
     * @ORM\Column(name="kindness", type="integer", nullable=true)
     */
    private $kindness;

    /**
     * @var integer
     *
     * @ORM\Column(name="brave", type="integer", nullable=true)
     */
    private $brave;

    /**
     * @var integer
     *
     * @ORM\Column(name="culture", type="integer", nullable=true)
     */
    private $culture;


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
     * Set name
     *
     * @param string $name
     * @return Answer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mind
     *
     * @param integer $mind
     * @return Answer
     */
    public function setMind($mind)
    {
        $this->mind = $mind;

        return $this;
    }

    /**
     * Get mind
     *
     * @return integer 
     */
    public function getMind()
    {
        return $this->mind;
    }

    /**
     * Set kindness
     *
     * @param integer $kindness
     * @return Answer
     */
    public function setKindness($kindness)
    {
        $this->kindness = $kindness;

        return $this;
    }

    /**
     * Get kindness
     *
     * @return integer 
     */
    public function getKindness()
    {
        return $this->kindness;
    }

    /**
     * Set brave
     *
     * @param integer $brave
     * @return Answer
     */
    public function setBrave($brave)
    {
        $this->brave = $brave;

        return $this;
    }

    /**
     * Get brave
     *
     * @return integer 
     */
    public function getBrave()
    {
        return $this->brave;
    }

    /**
     * Set culture
     *
     * @param integer $culture
     * @return Answer
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get culture
     *
     * @return integer 
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
}
