<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $full_name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\OneToMany(targetEntity: Serveur::class, mappedBy: 'gerant')]
    private Collection $serveurs;

    #[ORM\OneToMany(targetEntity: Restoinformation::class, mappedBy: 'gerant')]
    private Collection $restoinformations;

    #[ORM\OneToMany(targetEntity: Fooditem::class, mappedBy: 'gerant')]
    private Collection $fooditems;

    public function __construct()
    {
        $this->serveurs = new ArrayCollection();
        $this->restoinformations = new ArrayCollection();
        $this->fooditems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): static
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Serveur>
     */
    public function getServeurs(): Collection
    {
        return $this->serveurs;
    }

    public function addServeur(Serveur $serveur): static
    {
        if (!$this->serveurs->contains($serveur)) {
            $this->serveurs->add($serveur);
            $serveur->setGerant($this);
        }

        return $this;
    }

    public function removeServeur(Serveur $serveur): static
    {
        if ($this->serveurs->removeElement($serveur)) {
            // set the owning side to null (unless already changed)
            if ($serveur->getGerant() === $this) {
                $serveur->setGerant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restoinformation>
     */
    public function getRestoinformations(): Collection
    {
        return $this->restoinformations;
    }

    public function addRestoinformation(Restoinformation $restoinformation): static
    {
        if (!$this->restoinformations->contains($restoinformation)) {
            $this->restoinformations->add($restoinformation);
            $restoinformation->setGerant($this);
        }

        return $this;
    }

    public function removeRestoinformation(Restoinformation $restoinformation): static
    {
        if ($this->restoinformations->removeElement($restoinformation)) {
            // set the owning side to null (unless already changed)
            if ($restoinformation->getGerant() === $this) {
                $restoinformation->setGerant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fooditem>
     */
    public function getFooditems(): Collection
    {
        return $this->fooditems;
    }

    public function addFooditem(Fooditem $fooditem): static
    {
        if (!$this->fooditems->contains($fooditem)) {
            $this->fooditems->add($fooditem);
            $fooditem->setGerant($this);
        }

        return $this;
    }

    public function removeFooditem(Fooditem $fooditem): static
    {
        if ($this->fooditems->removeElement($fooditem)) {
            // set the owning side to null (unless already changed)
            if ($fooditem->getGerant() === $this) {
                $fooditem->setGerant(null);
            }
        }

        return $this;
    }
}
