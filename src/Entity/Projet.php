<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $code_projet;

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
     * @ORM\Column(type="integer")
     */
    private $site_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $MàJ_le;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $site;

    /**
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="projet")
     */
    private $biens;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeProjet(): ?string
    {
        return $this->code_projet;
    }

    public function setCodeProjet(string $code_projet): self
    {
        $this->code_projet = $code_projet;

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

    public function getSiteId(): ?int
    {
        return $this->site_id;
    }

    public function setSiteId(int $site_id): self
    {
        $this->site_id = $site_id;

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

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;

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
            $bien->setProjet($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getProjet() === $this) {
                $bien->setProjet(null);
            }
        }

        return $this;
    }
}
