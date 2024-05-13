<?php

namespace App\Entity;

use App\Repository\CommandRepository;
<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
=======
use Doctrine\DBAL\Types\Types;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_people = null;

    #[ORM\Column(length: 255)]
<<<<<<< HEAD
    private ?string $message = null;

    #[ORM\Column]
    private ?int $nb_table = null;

    #[ORM\Column(length: 255)]
    private ?string $statue = null;

    #[ORM\ManyToMany(targetEntity: Serveur::class, mappedBy: 'command_serveur')]
    private Collection $serveurs;

    #[ORM\ManyToOne(inversedBy: 'commands')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Shef $shef = null;

    public function __construct()
    {
        $this->serveurs = new ArrayCollection();
    }
=======
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPeople(): ?int
    {
        return $this->nb_people;
    }

    public function setNbPeople(int $nb_people): static
    {
        $this->nb_people = $nb_people;

        return $this;
    }

<<<<<<< HEAD
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;
=======
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

        return $this;
    }

<<<<<<< HEAD
    public function getNbTable(): ?int
    {
        return $this->nb_table;
    }

    public function setNbTable(int $nb_table): static
    {
        $this->nb_table = $nb_table;
=======
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

        return $this;
    }

<<<<<<< HEAD
    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): static
    {
        $this->statue = $statue;
=======
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

        return $this;
    }

<<<<<<< HEAD
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
            $serveur->addCommandServeur($this);
        }
=======
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

        return $this;
    }

<<<<<<< HEAD
    public function removeServeur(Serveur $serveur): static
    {
        if ($this->serveurs->removeElement($serveur)) {
            $serveur->removeCommandServeur($this);
        }

        return $this;
    }

    public function getShef(): ?Shef
    {
        return $this->shef;
    }

    public function setShef(?Shef $shef): static
    {
        $this->shef = $shef;
=======
    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;
>>>>>>> 46df55223385a8fa049aa45106e5a2be5ba07adc

        return $this;
    }
}
