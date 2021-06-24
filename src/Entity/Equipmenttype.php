<?php

namespace App\Entity;

use App\Repository\EquipmenttypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmenttypeRepository::class)
 */
class Equipmenttype
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
     * @ORM\OneToMany(targetEntity=Equipment::class, mappedBy="idEquipmenttype")
     */
    private $equipment;

    public function __construct()
    {
        $this->equipment = new ArrayCollection();
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

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment[] = $equipment;
            $equipment->setIdEquipmenttype($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getIdEquipmenttype() === $this) {
                $equipment->setIdEquipmenttype(null);
            }
        }

        return $this;
    }
}
