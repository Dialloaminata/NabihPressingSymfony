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
     * @ORM\Column(type="string", length=40)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $addresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity=LotHabit::class, mappedBy="Client")
     */
    private $lotHabits;
    public function __toString()
    {
        $format = "
         %s, %s , %s \n";
        return sprintf($format, $this->Nom,$this->prenom,$this->numero);
    }
    public function __construct()
    {
        $this->lotHabits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

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
