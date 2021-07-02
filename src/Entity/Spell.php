<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 */
class Spell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effect;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reach;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity=Spelltype::class, inversedBy="spells")
     */
    private $idSpelltype;

    /**
     * @ORM\OneToMany(targetEntity=CharacterSpell::class, mappedBy="idSpell")
     */
    private $characterSpells;

    public function __construct()
    {
        $this->characterSpells = new ArrayCollection();
    }

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

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    public function getReach(): ?int
    {
        return $this->reach;
    }

    public function setReach(?int $reach): self
    {
        $this->reach = $reach;

        return $this;
    }

    public function getZone(): ?int
    {
        return $this->zone;
    }

    public function setZone(?int $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getIdSpelltype(): ?Spelltype
    {
        return $this->idSpelltype;
    }

    public function setIdSpelltype(?Spelltype $idSpelltype): self
    {
        $this->idSpelltype = $idSpelltype;

        return $this;
    }

    /**
     * @return Collection|CharacterSpell[]
     */
    public function getCharacterSpells(): Collection
    {
        return $this->characterSpells;
    }

    public function addCharacterSpell(CharacterSpell $characterSpell): self
    {
        if (!$this->characterSpells->contains($characterSpell)) {
            $this->characterSpells[] = $characterSpell;
            $characterSpell->setIdSpell($this);
        }

        return $this;
    }

    public function removeCharacterSpell(CharacterSpell $characterSpell): self
    {
        if ($this->characterSpells->removeElement($characterSpell)) {
            // set the owning side to null (unless already changed)
            if ($characterSpell->getIdSpell() === $this) {
                $characterSpell->setIdSpell(null);
            }
        }

        return $this;
    }
}
