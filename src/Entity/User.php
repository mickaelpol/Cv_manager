<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`use_user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="use_email", type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="use_roles", type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(name="use_password", type="string")
     */
    private $password;

    /**
     * @ORM\Column(name="use_username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(name="use_lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(name="use_fisrtname", type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(name="use_adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(name="use_city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(name="use_country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(name="use_phonenumber", type="string", length=13, nullable=true)
     */
    private $phonenumber;

    /**
     * @ORM\Column(name="use_age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(name="use_permit", type="boolean", nullable=true)
     */
    private $permit;

    /**
     * @ORM\Column(name="use_vehicle", type="boolean", nullable=true)
     */
    private $vehicle;

    /**
     * @ORM\Column(name="use_job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(name="use_facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(name="use_linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(name="use_instagram", type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(name="use_twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(name="use_pinterest", type="string", length=255, nullable=true)
     */
    private $pinterest;

    /**
     * @ORM\Column(name="use_youtube", type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @ORM\Column(name="use_picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(name="use_lastlogin", type="string", length=255, nullable=true)
     */
    private $lastlogin;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="user")
     */
    private $categories;

    public function __toString()
    {
        return $this->getUsername();
    }

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->categories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPermit(): ?bool
    {
        return $this->permit;
    }

    public function setPermit(?bool $permit): self
    {
        $this->permit = $permit;

        return $this;
    }

    public function getVehicle(): ?bool
    {
        return $this->vehicle;
    }

    public function setVehicle(?bool $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getPinterest(): ?string
    {
        return $this->pinterest;
    }

    public function setPinterest(?string $pinterest): self
    {
        $this->pinterest = $pinterest;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLastlogin(): ?string
    {
        return $this->lastlogin;
    }

    public function setLastlogin(?string $lastlogin): self
    {
        $this->lastlogin = $lastlogin;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setUser($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getUser() === $this) {
                $category->setUser(null);
            }
        }

        return $this;
    }
}
