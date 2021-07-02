<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
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
    private $version;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $short_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="games" ,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategory;

    /**
     * @ORM\ManyToOne(targetEntity=Gamesystem::class, inversedBy="games" ,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idGamesystem;

    /**
     * @ORM\OneToMany(targetEntity=Gamerules::class, mappedBy="game", cascade={"persist"})
     */
    private $gamerules;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="idGame")
     * @ORM\JoinColumn(nullable=true)
   */
    private $characters;

    public function __construct()
    {
        $this->gamerules = new ArrayCollection();
        $this->characters = new ArrayCollection();
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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    public function getIdGamesystem(): ?Gamesystem
    {
        return $this->idGamesystem;
    }

    public function setIdGamesystem(?Gamesystem $idGamesystem): self
    {
        $this->idGamesystem = $idGamesystem;

        return $this;
    }

    /**
     * @return Collection|Gamerules[]
     */
    public function getGamerules(): Collection
    {
        return $this->gamerules;
    }

    public function addGamerule(Gamerules $gamerule): self
    {
        if (!$this->gamerules->contains($gamerule)) {
            $this->gamerules[] = $gamerule;
            $gamerule->setGame($this);
        }

        return $this;
    }

    public function removeGamerule(Gamerules $gamerule): self
    {
        if ($this->gamerules->removeElement($gamerule)) {
            // set the owning side to null (unless already changed)
            if ($gamerule->getGame() === $this) {
                $gamerule->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setIdGame($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getIdGame() === $this) {
                $character->setIdGame(null);
            }
        }

        return $this;
    }
}
