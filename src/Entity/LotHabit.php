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
     * @ORM\Column(type="string", length=10)
     */
    private $ReferenceHabit;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDepot;

    /**
     * @ORM\Column(type="date")
     */
    private $DateRemise;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $EtatHabit;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="lotHabits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Client;

    /**
     * @ORM\OneToMany(targetEntity=Habits::class, mappedBy="LotHabits")
     */
    private $habits;

    public function __construct()
    {
        $this->habits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferenceHabit(): ?string
    {
        return $this->ReferenceHabit;
    }

    public function setReferenceHabit(string $ReferenceHabit): self
    {
        $this->ReferenceHabit = $ReferenceHabit;

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

    public function getDateRemise(): ?\DateTimeInterface
    {
        return $this->DateRemise;
    }

    public function setDateRemise(\DateTimeInterface $DateRemise): self
    {
        $this->DateRemise = $DateRemise;

        return $this;
    }

    public function getEtatHabit(): ?string
    {
        return $this->EtatHabit;
    }

    public function setEtatHabit(string $EtatHabit): self
    {
        $this->EtatHabit = $EtatHabit;

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

    /**
     * @return Collection|Habits[]
     */
    public function getHabits(): Collection
    {
        return $this->habits;
    }

    public function addHabit(Habits $habit): self
    {
        if (!$this->habits->contains($habit)) {
            $this->habits[] = $habit;
            $habit->setLotHabits($this);
        }

        return $this;
    }

    public function removeHabit(Habits $habit): self
    {
        if ($this->habits->removeElement($habit)) {
            // set the owning side to null (unless already changed)
            if ($habit->getLotHabits() === $this) {
                $habit->setLotHabits(null);
            }
        }

        return $this;
    }
}
