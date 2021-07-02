<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
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
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $guidingHand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weight;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $distinctive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $occupation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $story;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_premade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthplace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $names_titles_surname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homeplace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $relatives;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $enemies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $loyalty;

    /**
     * @ORM\ManyToOne(targetEntity=Tribe::class, inversedBy="characters")
     */
    private $idTribe;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="characters")
     */
    private $idGame;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characters")
     */
    private $idUser;

    /**
     * @ORM\ManyToMany(targetEntity=Scenario::class, inversedBy="characters")
     */
    private $scenario;

    /**
     * @ORM\OneToMany(targetEntity=CharacterCharacteristic::class, mappedBy="idCharacter")
     */
    private $characterCharacteristics;

    public function __construct()
    {
        $this->scenario = new ArrayCollection();
        $this->characterCharacteristics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getGuidingHand(): ?string
    {
        return $this->guidingHand;
    }

    public function setGuidingHand(string $guidingHand): self
    {
        $this->guidingHand = $guidingHand;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getDistinctive(): ?string
    {
        return $this->distinctive;
    }

    public function setDistinctive(?string $distinctive): self
    {
        $this->distinctive = $distinctive;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(?string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getIsPremade(): ?bool
    {
        return $this->is_premade;
    }

    public function setIsPremade(bool $is_premade): self
    {
        $this->is_premade = $is_premade;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(?string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    public function getNamesTitlesSurname(): ?string
    {
        return $this->names_titles_surname;
    }

    public function setNamesTitlesSurname(?string $names_titles_surname): self
    {
        $this->names_titles_surname = $names_titles_surname;

        return $this;
    }

    public function getHomeplace(): ?string
    {
        return $this->homeplace;
    }

    public function setHomeplace(?string $homeplace): self
    {
        $this->homeplace = $homeplace;

        return $this;
    }

    public function getRelatives(): ?string
    {
        return $this->relatives;
    }

    public function setRelatives(?string $relatives): self
    {
        $this->relatives = $relatives;

        return $this;
    }

    public function getEnemies(): ?string
    {
        return $this->enemies;
    }

    public function setEnemies(?string $enemies): self
    {
        $this->enemies = $enemies;

        return $this;
    }

    public function getLoyalty(): ?string
    {
        return $this->loyalty;
    }

    public function setLoyalty(?string $loyalty): self
    {
        $this->loyalty = $loyalty;

        return $this;
    }

    public function getIdTribe(): ?Tribe
    {
        return $this->idTribe;
    }

    public function setIdTribe(?Tribe $idTribe): self
    {
        $this->idTribe = $idTribe;

        return $this;
    }

    public function getIdGame(): ?Game
    {
        return $this->idGame;
    }

    public function setIdGame(?Game $idGame): self
    {
        $this->idGame = $idGame;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getScenario(): Collection
    {
        return $this->scenario;
    }

    public function addScenario(Scenario $scenario): self
    {
        if (!$this->scenario->contains($scenario)) {
            $this->scenario[] = $scenario;
        }

        return $this;
    }

    public function removeScenario(Scenario $scenario): self
    {
        $this->scenario->removeElement($scenario);

        return $this;
    }

    /**
     * @return Collection|CharacterCharacteristic[]
     */
    public function getCharacterCharacteristics(): Collection
    {
        return $this->characterCharacteristics;
    }

    public function addCharacterCharacteristic(CharacterCharacteristic $characterCharacteristic): self
    {
        if (!$this->characterCharacteristics->contains($characterCharacteristic)) {
            $this->characterCharacteristics[] = $characterCharacteristic;
            $characterCharacteristic->setIdCharacter($this);
        }

        return $this;
    }

    public function removeCharacterCharacteristic(CharacterCharacteristic $characterCharacteristic): self
    {
        if ($this->characterCharacteristics->removeElement($characterCharacteristic)) {
            // set the owning side to null (unless already changed)
            if ($characterCharacteristic->getIdCharacter() === $this) {
                $characterCharacteristic->setIdCharacter(null);
            }
        }

        return $this;
    }
}
