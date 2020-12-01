<?php

namespace App\Entity;

use App\Repository\HabitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HabitsRepository::class)
 */
class Habits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $TarifHabit;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $ReferenceHabit;

    /**
     * @ORM\ManyToOne(targetEntity=LotHabit::class, inversedBy="habits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LotHabits;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifHabit(): ?int
    {
        return $this->TarifHabit;
    }

    public function setTarifHabit(int $TarifHabit): self
    {
        $this->TarifHabit = $TarifHabit;

        return $this;
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

    public function getLotHabits(): ?LotHabit
    {
        return $this->LotHabits;
    }

    public function setLotHabits(?LotHabit $LotHabits): self
    {
        $this->LotHabits = $LotHabits;

        return $this;
    }
}
