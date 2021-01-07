<?php

namespace App\Entity;

use App\Repository\LotHabitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotHabitRepository::class)
 */
class LotHabit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ReferenceLot;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDepot;

    /**
     * @ORM\Column(type="date")
     */
    private $DateRetrait;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Etat;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="lotHabits")
     */
    private $Client;

    /**
     * @ORM\ManyToMany(targetEntity=TypeHabit::class, inversedBy="lotHabits")
     */
    private $Habit;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    public function __construct()
    {
        $this->Habit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferenceLot(): ?string
    {
        return $this->ReferenceLot;
    }

    public function setReferenceLot(string $ReferenceLot): self
    {
        $this->ReferenceLot = $ReferenceLot;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->DateDepot;
    }

    public function setDateDepot(\DateTimeInterface $DateDepot): self
    {
        $this->DateDepot = $DateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->DateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $DateRetrait): self
    {
        $this->DateRetrait = $DateRetrait;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): self
    {
        $this->Client = $Client;

        return $this;
    }
    public function __toString()
    {
        $format = "%s \n";
        return sprintf($format, $this->ReferenceLot);
    }

    /**
     * @return Collection|TypeHabit[]
     */
    public function getHabit(): Collection
    {
        return $this->Habit;
    }

    public function addHabit(TypeHabit $habit): self
    {
        if (!$this->Habit->contains($habit)) {
            $this->Habit[] = $habit;
        }

        return $this;
    }

    public function removeHabit(TypeHabit $habit): self
    {
        $this->Habit->removeElement($habit);

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }
}
