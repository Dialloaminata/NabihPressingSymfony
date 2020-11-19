<?php

namespace App\Entity;

use App\Repository\LotHabitRepository;
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
}
