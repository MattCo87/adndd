<?php

namespace App\Entity;

use App\Repository\CharacterSkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterSkillRepository::class)
 */
class CharacterSkill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="characterSkills")
     */
    private $idCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="characterSkills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSkill;

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

    public function getIdSkill(): ?Skill
    {
        return $this->idSkill;
    }

    public function setIdSkill(?Skill $idSkill): self
    {
        $this->idSkill = $idSkill;

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
