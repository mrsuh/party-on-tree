<?php

namespace AdventureTimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Personage
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nameRussian", type="string", length=255)
     */
    private $nameRussian;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $race;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * @return Personage
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
     * Set nameRussian
     *
     * @param string $nameRussian
     * @return Personage
     */
    public function setNameRussian($nameRussian)
    {
        $this->nameRussian = $nameRussian;

        return $this;
    }

    /**
     * Get nameRussian
     *
     * @return string 
     */
    public function getNameRussian()
    {
        return $this->nameRussian;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Personage
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param string $race
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }


}
