<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref_rec;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Etat::class, mappedBy="reclamation")
     */
    private $etats;

    /**
     * @ORM\OneToMany(targetEntity=Canal::class, mappedBy="reclamation")
     */
    private $canals;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reclamation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function __construct()
    {
        $this->etats = new ArrayCollection();
        $this->canals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefRec(): ?string
    {
        return $this->ref_rec;
    }

    public function setRefRec(string $ref_rec): self
    {
        $this->ref_rec = $ref_rec;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    /**
     * @return Collection|Etat[]
     */
    public function getEtats(): Collection
    {
        return $this->etats;
    }

    public function addEtat(Etat $etat): self
    {
        if (!$this->etats->contains($etat)) {
            $this->etats[] = $etat;
            $etat->setReclamation($this);
        }

        return $this;
    }

    public function removeEtat(Etat $etat): self
    {
        if ($this->etats->removeElement($etat)) {
            // set the owning side to null (unless already changed)
            if ($etat->getReclamation() === $this) {
                $etat->setReclamation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Canal[]
     */
    public function getCanals(): Collection
    {
        return $this->canals;
    }

    public function addCanal(Canal $canal): self
    {
        if (!$this->canals->contains($canal)) {
            $this->canals[] = $canal;
            $canal->setReclamation($this);
        }

        return $this;
    }

    public function removeCanal(Canal $canal): self
    {
        if ($this->canals->removeElement($canal)) {
            // set the owning side to null (unless already changed)
            if ($canal->getReclamation() === $this) {
                $canal->setReclamation(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
    public function __toString()
    {
        return $this->ref_rec;
    }
}
