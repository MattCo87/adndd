<?php

namespace App\Entity;

use App\Entity\Skill;
use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
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
     * @ORM\Column(type="integer")
     */
    private $base;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $damage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hands;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $health;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ranged;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $armorPoints;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $skillModifyer;

    /**
     * @ORM\ManyToOne(targetEntity=Specialty::class, inversedBy="equipment", cascade={"persist"})
     */
    private $idSpecialty;

    /**
     * @ORM\ManyToOne(targetEntity=Equipmenttype::class, inversedBy="equipment", cascade={"persist"})
     */
    private $idEquipmenttype;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="equipments", cascade={"persist"})
     * @ORM\JoinTable(name="equipment_skill")
     */
    private $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
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

    public function setBase(int $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getDamage(): ?string
    {
        return $this->damage;
    }

    public function setDamage(?string $damage): self
    {
        $this->damage = $damage;

        return $this;
    }

    public function getHands(): ?int
    {
        return $this->hands;
    }

    public function setHands(?int $hands): self
    {
        $this->hands = $hands;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(?int $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getRanged(): ?int
    {
        return $this->ranged;
    }

    public function setRanged(?int $ranged): self
    {
        $this->ranged = $ranged;

        return $this;
    }

    public function getArmorPoints(): ?int
    {
        return $this->armorPoints;
    }

    public function setArmorPoints(?int $armorPoints): self
    {
        $this->armorPoints = $armorPoints;

        return $this;
    }

    public function getSkillModifyer(): ?int
    {
        return $this->skillModifyer;
    }

    public function setSkillModifyer(?int $skillModifyer): self
    {
        $this->skillModifyer = $skillModifyer;

        return $this;
    }

    public function getIdSpecialty(): ?Specialty
    {
        return $this->idSpecialty;
    }

    public function setIdSpecialty(?Specialty $idSpecialty): self
    {
        $this->idSpecialty = $idSpecialty;

        return $this;
    }

    public function getIdEquipmenttype(): ?Equipmenttype
    {
        return $this->idEquipmenttype;
    }

    public function setIdEquipmenttype(?Equipmenttype $idEquipmenttype): self
    {
        $this->idEquipmenttype = $idEquipmenttype;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }
}
