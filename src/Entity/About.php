<?php

namespace App\Entity;

use App\Repository\AboutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutRepository::class)]
class About
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $new_food_plats = null;

    #[ORM\Column]
    private ?int $phone_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vedio_resto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewFoodPlats(): ?string
    {
        return $this->new_food_plats;
    }

    public function setNewFoodPlats(string $new_food_plats): static
    {
        $this->new_food_plats = $new_food_plats;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getVedioResto(): ?string
    {
        return $this->vedio_resto;
    }

    public function setVedioResto(?string $vedio_resto): static
    {
        $this->vedio_resto = $vedio_resto;

        return $this;
    }
}
