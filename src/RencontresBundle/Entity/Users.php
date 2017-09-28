<?php

namespace RencontresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @UniqueEntity("email", message="Cette adresse email est déjà utilisée ! ")
 * @ORM\Entity(repositoryClass="RencontresBundle\Repository\UsersRepository")
 */
class Users implements UserInterface
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     */
    private $username;

    /**
     * @var string
     * @Assert\Regex(
     *     pattern="/[a-zA-Z0-9]{3,}@[a-zA-Z0-9]{3,}+.([a-zA-Z]{2,}+$)/",
     *     match=true,
     *     message="Le format de votre adresse email est incorrect."
     *     )
     * @Assert\NotBlank(message="Veuillez renseigner une adresse email ! ")
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank(message="Veuillez renseigner un mot de passe ! ")
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=12)
     */
    private $genre;

    /**
     * @var \DateTime
     * @Assert\NotBlank(message="Veuillez renseigner votre date de naissance ! ")
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var array
     *
     * @ORM\Column(name="pictures", type="array", nullable=true)
     */
    private $pictures;


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
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Users
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return Users
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set pictures
     *
     * @param array $pictures
     *
     * @return Users
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get pictures
     *
     * @return array
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    public function getRoles(){
        return ["ROLE_USER"];
    }

    public function getSalt(){}

    // Rien à faire ici car on hash le mot de passe
    public function eraseCredentials(){}

}
