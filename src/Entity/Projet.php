<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
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
}
