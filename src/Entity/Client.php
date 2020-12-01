<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $NumClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $PrenomClient;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $AddresseClient;

    /**
     * @ORM\OneToMany(targetEntity=LotHabit::class, mappedBy="Client")
     */
    private $lotHabits;

    public function __construct()
    {
        $this->lotHabits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumClient(): ?string
    {
        return $this->NumClient;
    }

    public function setNumClient(string $NumClient): self
    {
        $this->NumClient = $NumClient;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): self
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->PrenomClient;
    }

    public function setPrenomClient(string $PrenomClient): self
    {
        $this->PrenomClient = $PrenomClient;

        return $this;
    }

    public function getAddresseClient(): ?string
    {
        return $this->AddresseClient;
    }

    public function setAddresseClient(string $AddresseClient): self
    {
        $this->AddresseClient = $AddresseClient;

        return $this;
    }

    /**
     * @return Collection|LotHabit[]
     */
    public function getLotHabits(): Collection
    {
        return $this->lotHabits;
    }

    public function addLotHabit(LotHabit $lotHabit): self
    {
        if (!$this->lotHabits->contains($lotHabit)) {
            $this->lotHabits[] = $lotHabit;
            $lotHabit->setClient($this);
        }

        return $this;
    }

    public function removeLotHabit(LotHabit $lotHabit): self
    {
        if ($this->lotHabits->removeElement($lotHabit)) {
            // set the owning side to null (unless already changed)
            if ($lotHabit->getClient() === $this) {
                $lotHabit->setClient(null);
            }
        }

        return $this;
    }
}
