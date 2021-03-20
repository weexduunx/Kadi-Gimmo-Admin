<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $code_site;

    /**
     * @ORM\Column(type="datetime")
     */
    private $crée_le;

    /**
     * @ORM\Column(type="datetime")
     */
    private $supprimé_le;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $MàJ_le;

    /**
     * @ORM\Column(type="integer")
     */
    private $ville_id;

    /**
     * @ORM\OneToMany(targetEntity=Projet::class, mappedBy="site")
     */
    private $projets;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="site")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeSite(): ?string
    {
        return $this->code_site;
    }

    public function setCodeSite(string $code_site): self
    {
        $this->code_site = $code_site;

        return $this;
    }

    public function getCréeLe(): ?\DateTimeInterface
    {
        return $this->crée_le;
    }

    public function setCréeLe(\DateTimeInterface $crée_le): self
    {
        $this->crée_le = $crée_le;

        return $this;
    }

    public function getSuppriméLe(): ?\DateTimeInterface
    {
        return $this->supprimé_le;
    }

    public function setSuppriméLe(\DateTimeInterface $supprimé_le): self
    {
        $this->supprimé_le = $supprimé_le;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMàJLe(): ?\DateTimeInterface
    {
        return $this->MàJ_le;
    }

    public function setMàJLe(\DateTimeInterface $MàJ_le): self
    {
        $this->MàJ_le = $MàJ_le;

        return $this;
    }

    public function getVilleId(): ?int
    {
        return $this->ville_id;
    }

    public function setVilleId(int $ville_id): self
    {
        $this->ville_id = $ville_id;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setSite($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getSite() === $this) {
                $projet->setSite(null);
            }
        }

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
