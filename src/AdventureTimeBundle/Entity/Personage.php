<?php namespace AdventureTimeBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="mind", type="integer")
     */
    private $mind;

    /**
     * @var integer
     *
     * @ORM\Column(name="kindness", type="integer")
     */
    private $kindness;

    /**
     * @var integer
     *
     * @ORM\Column(name="brave", type="integer")
     */
    private $brave;

    /**
     * @var integer
     *
     * @ORM\Column(name="culture", type="integer")
     */
    private $culture;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isBlocked", type="boolean")
     */
    private $isBlocked;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getMind()
    {
        return $this->mind;
    }

    /**
     * @param int $mind
     */
    public function setMind($mind)
    {
        $this->mind = $mind;

        return $this;
    }

    /**
     * @return int
     */
    public function getKindness()
    {
        return $this->kindness;
    }

    /**
     * @param int $kindness
     */
    public function setKindness($kindness)
    {
        $this->kindness = $kindness;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrave()
    {
        return $this->brave;
    }

    /**
     * @param int $brave
     */
    public function setBrave($brave)
    {
        $this->brave = $brave;

        return $this;
    }

    /**
     * @return int
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * @param int $culture
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
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
     * @return boolean
     */
    public function isIsBlocked()
    {
        return $this->isBlocked;
    }

    /**
     * @param boolean $isBlocked
     */
    public function setIsBlocked($isBlocked)
    {
        $this->isBlocked = $isBlocked;

        return $this;
    }


}
