<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
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
     * @ORM\Column(type="integer")
     */
    private $bien_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $client_id;


    /**
     * @ORM\ManyToOne(targetEntity=Bien::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="date")
     */
    private $debut_candidature;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree_du_contrat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $mensualite;

    /**
     * @ORM\Column(type="array")
     */
    private $nature_du_logement = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBienId(): ?int
    {
        return $this->bien_id;
    }

    public function setBienId(int $bien_id): self
    {
        $this->bien_id = $bien_id;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getBien(): ?Bien
    {
        return $this->bien;
    }

    public function setBien(?Bien $bien): self
    {
        $this->bien = $bien;

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

    public function getDebutCandidature(): ?\DateTimeInterface
    {
        return $this->debut_candidature;
    }

    public function setDebutCandidature(\DateTimeInterface $debut_candidature): self
    {
        $this->debut_candidature = $debut_candidature;

        return $this;
    }

    public function getDureeDuContrat(): ?string
    {
        return $this->duree_du_contrat;
    }

    public function setDureeDuContrat(string $duree_du_contrat): self
    {
        $this->duree_du_contrat = $duree_du_contrat;

        return $this;
    }

    public function getMensualite(): ?string
    {
        return $this->mensualite;
    }

    public function setMensualite(string $mensualite): self
    {
        $this->mensualite = $mensualite;

        return $this;
    }

    public function getNatureDuLogement(): ?array
    {
        return $this->nature_du_logement;
    }

    public function setNatureDuLogement(array $nature_du_logement): self
    {
        $this->nature_du_logement = $nature_du_logement;

        return $this;
    }
}
