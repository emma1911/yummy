<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_peapol = null;

    #[ORM\Column(length: 255)]
    private ?string $food_name = null;

    #[ORM\Column(length: 255)]
    private ?string $command_state = null;

    #[ORM\ManyToOne(inversedBy: 'commands')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Shef $id_shef = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPeapol(): ?int
    {
        return $this->nb_peapol;
    }

    public function setNbPeapol(int $nb_peapol): static
    {
        $this->nb_peapol = $nb_peapol;

        return $this;
    }

    public function getFoodName(): ?string
    {
        return $this->food_name;
    }

    public function setFoodName(string $food_name): static
    {
        $this->food_name = $food_name;

        return $this;
    }

    public function getCommandState(): ?string
    {
        return $this->command_state;
    }

    public function setCommandState(string $command_state): static
    {
        $this->command_state = $command_state;

        return $this;
    }

    public function getIdShef(): ?Shef
    {
        return $this->id_shef;
    }

    public function setIdShef(?Shef $id_shef): static
    {
        $this->id_shef = $id_shef;

        return $this;
    }
}
