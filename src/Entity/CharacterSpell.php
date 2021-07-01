<?php

namespace App\Entity;

use App\Repository\CharacterSpellRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterSpellRepository::class)
 */
class CharacterSpell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="characterSpells")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=Spell::class, inversedBy="characterSpells")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSpell;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    public function __toString() {
        return $this->name;
    }

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

    public function getIdSpell(): ?Spell
    {
        return $this->idSpell;
    }

    public function setIdSpell(?Spell $idSpell): self
    {
        $this->idSpell = $idSpell;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
