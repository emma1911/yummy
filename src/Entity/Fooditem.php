<?php

namespace App\Entity;

use App\Repository\FooditemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?int $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(targetEntity: Admin::class, mappedBy: 'food')]
    private Collection $admins;

    #[ORM\ManyToMany(targetEntity: Command::class)]
    private Collection $food_command;

    public function __construct()
    {
        $this->admins = new ArrayCollection();
        $this->food_command = new ArrayCollection();
    }

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

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

    /**
     * @return Collection<int, Admin>
     */
    public function getAdmins(): Collection
    {
        return $this->admins;
    }

    public function addAdmin(Admin $admin): static
    {
        if (!$this->admins->contains($admin)) {
            $this->admins->add($admin);
            $admin->setFood($this);
        }

        return $this;
    }

    public function removeAdmin(Admin $admin): static
    {
        if ($this->admins->removeElement($admin)) {
            // set the owning side to null (unless already changed)
            if ($admin->getFood() === $this) {
                $admin->setFood(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Command>
     */
    public function getFoodCommand(): Collection
    {
        return $this->food_command;
    }

    public function addFoodCommand(Command $foodCommand): static
    {
        if (!$this->food_command->contains($foodCommand)) {
            $this->food_command->add($foodCommand);
        }

        return $this;
    }

    public function removeFoodCommand(Command $foodCommand): static
    {
        $this->food_command->removeElement($foodCommand);

        return $this;
    }
}
