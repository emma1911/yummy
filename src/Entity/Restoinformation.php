<?php

namespace App\Entity;

use App\Repository\RestoinformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestoinformationRepository::class)]
class Restoinformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $openinghours = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(targetEntity: Admin::class, mappedBy: 'restoinfo')]
    private Collection $admins;

    public function __construct()
    {
        $this->admins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getOpeninghours(): ?string
    {
        return $this->openinghours;
    }

    public function setOpeninghours(string $openinghours): static
    {
        $this->openinghours = $openinghours;

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
            $admin->setRestoinfo($this);
        }

        return $this;
    }

    public function removeAdmin(Admin $admin): static
    {
        if ($this->admins->removeElement($admin)) {
            // set the owning side to null (unless already changed)
            if ($admin->getRestoinfo() === $this) {
                $admin->setRestoinfo(null);
            }
        }

        return $this;
    }
}
