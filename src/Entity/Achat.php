<?php

namespace App\Entity;

use App\Repository\AchatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AchatRepository::class)
 */
class Achat
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
    private $TypeAchat;

    /**
     * @ORM\Column(type="integer")
     */
    private $PrixAchat;

    /**
     * @ORM\Column(type="date")
     */
    private $DateAchat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumeroFacture;

  
    public function __toString()
    {
        $format = "%s \n";
        return sprintf($format, $this->NumeroFacture);
    }
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="achats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAchat(): ?string
    {
        return $this->TypeAchat;
    }

    public function setTypeAchat(string $TypeAchat): self
    {
        $this->TypeAchat = $TypeAchat;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->PrixAchat;
    }

    public function setPrixAchat(int $PrixAchat): self
    {
        $this->PrixAchat = $PrixAchat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->DateAchat;
    }

    public function setDateAchat(\DateTimeInterface $DateAchat): self
    {
        $this->DateAchat = $DateAchat;

        return $this;
    }

    public function getNumeroFacture(): ?string
    {
        return $this->NumeroFacture;
    }

    public function setNumeroFacture(string $NumeroFacture): self
    {
        $this->NumeroFacture = $NumeroFacture;

        return $this;
    }

   

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
