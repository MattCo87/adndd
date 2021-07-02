<?php

namespace App\Entity;

use App\Repository\CharacterCharacteristicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterCharacteristicRepository::class)
 */
class CharacterCharacteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="characterCharacteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=Characteristic::class, inversedBy="characterCharacteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCharacteristic;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCharacter(): ?Character
    {
        return $this->idCharacter;
    }

    public function setIdCharacter(?Character $idCharacter): self
    {
        $this->idCharacter = $idCharacter;

        return $this;
    }

    public function getIdCharacteristic(): ?Characteristic
    {
        return $this->idCharacteristic;
    }

    public function setIdCharacteristic(?Characteristic $idCharacteristic): self
    {
        $this->idCharacteristic = $idCharacteristic;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
}
