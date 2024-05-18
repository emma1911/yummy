<?php

namespace App\Entity;

use App\Repository\FooditemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooditemRepository::class)]
class Fooditem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'fooditems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $gerant = null;

    #[ORM\Column(length: 255)]
    private ?string $name_food = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }
    

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGerant(): ?User
    {
        return $this->gerant;
    }

    public function setGerant(?User $gerant): static
    {
        $this->gerant = $gerant;

        return $this;
    }

    public function getNameFood(): ?string
    {
        return $this->name_food;
    }

    public function setNameFood(string $name_food): static
    {
        $this->name_food = $name_food;

        return $this;
    }
}
