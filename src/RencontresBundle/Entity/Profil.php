<?php

namespace RencontresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="RencontresBundle\Repository\ProfilRepository")
 */
class Profil
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
     * @var int
     *
     * @ORM\Column(name="taille", type="integer", nullable=true)
     */
    private $taille;

    /**
     * @var int
     *
     * @ORM\Column(name="poids", type="integer", nullable=true)
     */
    private $poids;

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
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="passions", type="string", length=255, nullable=true)
     */
    private $passions;

    /**
     * @ORM\OneToOne(targetEntity="Preferences")
     */
    private $preferences;


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
     * @return Profil
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
     * @return Profil
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
     * Set taille
     *
     * @param integer $taille
     *
     * @return Profil
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return int
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param integer $poids
     *
     * @return Profil
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return int
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set cheveux
     *
     * @param string $cheveux
     *
     * @return Profil
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
     * @return Profil
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

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Profil
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Profil
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set passions
     *
     * @param string $passions
     *
     * @return Profil
     */
    public function setPassions($passions)
    {
        $this->passions = $passions;

        return $this;
    }

    /**
     * Get passions
     *
     * @return string
     */
    public function getPassions()
    {
        return $this->passions;
    }

    /**
     * Set preferences
     *
     * @param \stdClass $preferences
     *
     * @return Profil
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get preferences
     *
     * @return \stdClass
     */
    public function getPreferences()
    {
        return $this->preferences;
    }
}
