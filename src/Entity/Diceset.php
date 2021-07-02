<?php

namespace App\Entity;

use App\Repository\DicesetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DicesetRepository::class)
 */
class Diceset
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
     * @ORM\OneToMany(targetEntity=Gamesystem::class, mappedBy="idDiceset" ,cascade={"persist"})
     */
    private $gamesystems;

    /**
     * @ORM\ManyToMany(targetEntity=Dice::class, mappedBy="dicesets", cascade={"persist"})
     */
    private $dices;

    public function __construct()
    {
        $this->gamesystems = new ArrayCollection();
        $this->dices = new ArrayCollection();
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
     * @return Collection|Gamesystem[]
     */
    public function getGamesystems(): Collection
    {
        return $this->gamesystems;
    }

    public function addGamesystem(Gamesystem $gamesystem): self
    {
        if (!$this->gamesystems->contains($gamesystem)) {
            $this->gamesystems[] = $gamesystem;
            $gamesystem->setIdDiceset($this);
        }

        return $this;
    }

    public function removeGamesystem(Gamesystem $gamesystem): self
    {
        if ($this->gamesystems->removeElement($gamesystem)) {
            // set the owning side to null (unless already changed)
            if ($gamesystem->getIdDiceset() === $this) {
                $gamesystem->setIdDiceset(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dice[]
     */
    public function getDices(): Collection
    {
        return $this->dices;
    }

    public function addDice(Dice $dice): self
    {
        if (!$this->dices->contains($dice)) {
            $this->dices[] = $dice;
            $dice->addDiceset($this);
        }

        return $this;
    }

    public function removeDice(Dice $dice): self
    {
        if ($this->dices->removeElement($dice)) {
            $dice->removeDiceset($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
