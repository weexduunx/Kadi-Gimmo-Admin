<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
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
     * @ORM\Column(type="integer")
     */
    private $canal_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichier;

    /**
     * @ORM\Column(type="integer")
     */
    private $mode;

    /**
     * @ORM\Column(type="boolean")
     */
    private $MàJ_Reclamation;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reclamations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class, inversedBy="reclamations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=Canal::class, inversedBy="reclamations")
     */
    private $canal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCanalId(): ?int
    {
        return $this->canal_id;
    }

    public function setCanalId(int $canal_id): self
    {
        $this->canal_id = $canal_id;

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

    public function getEtatId(): ?int
    {
        return $this->etat_id;
    }

    public function setEtatId(int $etat_id): self
    {
        $this->etat_id = $etat_id;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getMode(): ?int
    {
        return $this->mode;
    }

    public function setMode(int $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getMàJReclamation(): ?bool
    {
        return $this->MàJ_Reclamation;
    }

    public function setMàJReclamation(bool $MàJ_Reclamation): self
    {
        $this->MàJ_Reclamation = $MàJ_Reclamation;

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

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCanal(): ?Canal
    {
        return $this->canal;
    }

    public function setCanal(?Canal $canal): self
    {
        $this->canal = $canal;

        return $this;
    }
}
