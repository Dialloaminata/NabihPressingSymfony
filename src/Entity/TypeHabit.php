<?php

namespace App\Entity;

use App\Repository\TypeHabitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeHabitRepository::class)
 */
class TypeHabit
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
    private $ReferenceHabit;

    /**
     * @ORM\Column(type="integer")
     */
    private $Tarifs;

    /**
     * @ORM\ManyToMany(targetEntity=LotHabit::class, mappedBy="Habit")
     */
    private $lotHabits;

    public function __construct()
    {
        $this->lotHabits = new ArrayCollection();
    }
    public function __toString()
    {
        $format = "%s   %s \n";
        return sprintf($format, $this->ReferenceHabit,$this->Tarifs);
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

    public function getTarifs(): ?int
    {
        return $this->Tarifs;
    }

    public function setTarifs(int $Tarifs): self
    {
        $this->Tarifs = $Tarifs;

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
            $lotHabit->addHabit($this);
        }

        return $this;
    }

    public function removeLotHabit(LotHabit $lotHabit): self
    {
        if ($this->lotHabits->removeElement($lotHabit)) {
            $lotHabit->removeHabit($this);
        }

        return $this;
    }
}
