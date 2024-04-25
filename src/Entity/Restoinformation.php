<?php

namespace App\Entity;

use App\Repository\RestoinformationRepository;
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
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $openinghours = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToOne(mappedBy: 'restoinformation', cascade: ['persist', 'remove'])]
    private ?Admin $admis = null;
    
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAdmis(): ?Admin
    {
        return $this->admis;
    }

    public function setAdmis(Admin $admis): static
    {
        // set the owning side of the relation if necessary
        if ($admis->getRestoinformation() !== $this) {
            $admis->setRestoinformation($this);
        }

        $this->admis = $admis;

        return $this;
    }


    
}
