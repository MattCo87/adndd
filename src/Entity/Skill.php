<?php

namespace App\Entity;

use App\Entity\Equipment;
use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $base;

    /**
     * @ORM\ManyToMany(targetEntity=Equipment::class, mappedBy="skills", cascade={"persist"})
     */
    private $equipments;

    /**
     * @ORM\OneToMany(targetEntity=CharacterSkill::class, mappedBy="idSkill")
     */
    private $characterSkills;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->characterSkills = new ArrayCollection();
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

    public function getBase(): ?int
    {
        return $this->base;
    }

    public function setBase(?int $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }

/**
 * @return Collection|Equipment[]
 */
public function getEquipments(): Collection
{
    return $this->equipments;
}

public function addEquipment(Equipment $equipment): self
{
    if (!$this->equipments->contains($equipment)) {
        $this->equipments[] = $equipment;
        $equipment->addSkill($this);
    }

    return $this;
}

public function removeEquipment(Equipment $equipment): self
{
    if ($this->equipments->removeElement($equipment)) {
        $equipment->removeSkill($this);
    }

    return $this;
}

/**
 * @return Collection|CharacterSkill[]
 */
public function getCharacterSkills(): Collection
{
    return $this->characterSkills;
}

public function addCharacterSkill(CharacterSkill $characterSkill): self
{
    if (!$this->characterSkills->contains($characterSkill)) {
        $this->characterSkills[] = $characterSkill;
        $characterSkill->setIdSkill($this);
    }

    return $this;
}

public function removeCharacterSkill(CharacterSkill $characterSkill): self
{
    if ($this->characterSkills->removeElement($characterSkill)) {
        // set the owning side to null (unless already changed)
        if ($characterSkill->getIdSkill() === $this) {
            $characterSkill->setIdSkill(null);
        }
    }

    return $this;
}
}
