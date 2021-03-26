<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureRepository::class)
 */
class Candidature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $cout_global;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $monthly;

    /**
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="candidature")
     */
    private $biens;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_de_candidature;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="candidature")
     */
    private $clients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_du_bien;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoutGlobal(): ?string
    {
        return $this->cout_global;
    }

    public function setCoutGlobal(string $cout_global): self
    {
        $this->cout_global = $cout_global;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMonthly(): ?string
    {
        return $this->monthly;
    }

    public function setMonthly(string $monthly): self
    {
        $this->monthly = $monthly;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addBien(Bien $bien): self
    {
        if (!$this->biens->contains($bien)) {
            $this->biens[] = $bien;
            $bien->setCandidature($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getCandidature() === $this) {
                $bien->setCandidature(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->type_de_candidature;
    }

    public function getTypeDeCandidature(): ?string
    {
        return $this->type_de_candidature;
    }

    public function setTypeDeCandidature(string $type_de_candidature): self
    {
        $this->type_de_candidature = $type_de_candidature;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setCandidature($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getCandidature() === $this) {
                $client->setCandidature(null);
            }
        }

        return $this;
    }

    public function getNomDuBien(): ?string
    {
        return $this->nom_du_bien;
    }

    public function setNomDuBien(string $nom_du_bien): self
    {
        $this->nom_du_bien = $nom_du_bien;

        return $this;
    }
}
