<?php

namespace App\Entity;

use App\Repository\AdminRepository;
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

    #[ORM\ManyToOne(inversedBy: 'admins')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Restoinformation $restoinfo = null;

    #[ORM\ManyToOne(inversedBy: 'admins')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serveur $serveur = null;

    #[ORM\ManyToOne(inversedBy: 'admins')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fooditem $food = null;

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

    public function getRestoinfo(): ?Restoinformation
    {
        return $this->restoinfo;
    }

    public function setRestoinfo(?Restoinformation $restoinfo): static
    {
        $this->restoinfo = $restoinfo;

        return $this;
    }

    public function getServeur(): ?Serveur
    {
        return $this->serveur;
    }

    public function setServeur(?Serveur $serveur): static
    {
        $this->serveur = $serveur;

        return $this;
    }

    public function getFood(): ?Fooditem
    {
        return $this->food;
    }

    public function setFood(?Fooditem $food): static
    {
        $this->food = $food;

        return $this;
    }
}
