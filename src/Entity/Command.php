<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getNbTable(): ?int
    {
        return $this->nb_table;
    }

    public function setNbTable(int $nb_table): static
    {
        $this->nb_table = $nb_table;

        return $this;
    }

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): static
    {
        $this->statue = $statue;

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
            $serveur->addCommandServeur($this);
        }

        return $this;
    }

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

        return $this;
    }
}
