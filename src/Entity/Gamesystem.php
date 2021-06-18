<?php

namespace App\Entity;

use App\Repository\GamesystemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GamesystemRepository::class)
 */
class Gamesystem
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
     * @ORM\ManyToOne(targetEntity=Diceset::class, inversedBy="gamesystems" ,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idDiceset;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="idGamesystem")
     */
    private $games;

    public function __construct()
    {
        $this->games = new ArrayCollection();
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

    public function getIdDiceset(): ?Diceset
    {
        return $this->idDiceset;
    }

    public function setIdDiceset(?Diceset $idDiceset): self
    {
        $this->idDiceset = $idDiceset;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setIdGamesystem($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getIdGamesystem() === $this) {
                $game->setIdGamesystem(null);
            }
        }

        return $this;
    }
}
