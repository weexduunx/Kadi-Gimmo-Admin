<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BienRepository::class)
 */
class Bien
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
    private $code_bien;

    /**
     * @ORM\Column(type="datetime")
     */
    private $crée_le;

    /**
     * @ORM\Column(type="datetime")
     */
    private $supprimé_le;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $projet_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $superficie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $MàJ_le;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeBien(): ?string
    {
        return $this->code_bien;
    }

    public function setCodeBien(string $code_bien): self
    {
        $this->code_bien = $code_bien;

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

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getProjetId(): ?int
    {
        return $this->projet_id;
    }

    public function setProjetId(int $projet_id): self
    {
        $this->projet_id = $projet_id;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getTitre(): ?bool
    {
        return $this->titre;
    }

    public function setTitre(bool $titre): self
    {
        $this->titre = $titre;

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
