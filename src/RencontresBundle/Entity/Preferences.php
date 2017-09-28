<?php

namespace RencontresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preferences
 *
 * @ORM\Table(name="preferences")
 * @ORM\Entity(repositoryClass="RencontresBundle\Repository\PreferencesRepository")
 */
class Preferences
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=5)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="cheveux", type="string", length=50, nullable=true)
     */
    private $cheveux;

    /**
     * @var string
     *
     * @ORM\Column(name="yeux", type="string", length=50, nullable=true)
     */
    private $yeux;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Preferences
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Preferences
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set cheveux
     *
     * @param string $cheveux
     *
     * @return Preferences
     */
    public function setCheveux($cheveux)
    {
        $this->cheveux = $cheveux;

        return $this;
    }

    /**
     * Get cheveux
     *
     * @return string
     */
    public function getCheveux()
    {
        return $this->cheveux;
    }

    /**
     * Set yeux
     *
     * @param string $yeux
     *
     * @return Preferences
     */
    public function setYeux($yeux)
    {
        $this->yeux = $yeux;

        return $this;
    }

    /**
     * Get yeux
     *
     * @return string
     */
    public function getYeux()
    {
        return $this->yeux;
    }
}

