<?php

namespace App\Entity;

use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisationRepository::class)
 */
class Organisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $slogan;

    /**
     * @ORM\Column(type="text")
     */
    private $contact_email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="text")
     */
    private $adress1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adress2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adress3;

    /**
     * @ORM\Column(type="text")
     */
    private $city;

    /**
     * @ORM\Column(type="text")
     */
    private $country;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $youtube;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contact_email;
    }

    public function setContactEmail(string $contact_email): self
    {
        $this->contact_email = $contact_email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdress1(): ?string
    {
        return $this->adress1;
    }

    public function setAdress1(string $adress1): self
    {
        $this->adress1 = $adress1;

        return $this;
    }

    public function getAdress2(): ?string
    {
        return $this->adress2;
    }

    public function setAdress2(?string $adress2): self
    {
        $this->adress2 = $adress2;

        return $this;
    }

    public function getAdress3(): ?string
    {
        return $this->adress3;
    }

    public function setAdress3(?string $adress3): self
    {
        $this->adress3 = $adress3;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

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

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }
}
