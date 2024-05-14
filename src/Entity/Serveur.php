<?php

namespace App\Entity;

use App\Repository\ServeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServeurRepository::class)]
class Serveur
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

    #[ORM\ManyToMany(targetEntity: Command::class, inversedBy: 'serveurs')]
    private Collection $command_serveur;

    #[ORM\ManyToOne(inversedBy: 'serveurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Admin $gerant = null;

    public function __construct()
    {
        $this->command_serveur = new ArrayCollection();
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
     * @return Collection<int, Command>
     */
    public function getCommandServeur(): Collection
    {
        return $this->command_serveur;
    }

    public function addCommandServeur(Command $commandServeur): static
    {
        if (!$this->command_serveur->contains($commandServeur)) {
            $this->command_serveur->add($commandServeur);
        }

        return $this;
    }

    public function removeCommandServeur(Command $commandServeur): static
    {
        $this->command_serveur->removeElement($commandServeur);

        return $this;
    }

    public function getGerant(): ?Admin
    {
        return $this->gerant;
    }

    public function setGerant(?Admin $gerant): static
    {
        $this->gerant = $gerant;

        return $this;
    }

}
