<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=BienRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"id":"exact"})
 * @Vich\Uploadable
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
    private $ref_bien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nature_du_bien;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $prix_du_bien;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $superficie;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Achat::class, inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $achat;

    /**
     * @ORM\ManyToOne(targetEntity=Candidature::class, inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $candidature;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDeBien::class, inversedBy="bien")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeDeBien;

    /**
     * @ORM\OneToMany(targetEntity=Projet::class, mappedBy="bien")
     */
    private $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBien(): ?string
    {
        return $this->ref_bien;
    }

    public function setRefBien(string $ref_bien): self
    {
        $this->ref_bien = $ref_bien;

        return $this;
    }

    public function getNatureDuBien(): ?string
    {
        return $this->nature_du_bien;
    }

    public function setNatureDuBien(string $nature_du_bien): self
    {
        $this->nature_du_bien = $nature_du_bien;

        return $this;
    }

    public function getPrixDuBien(): ?string
    {
        return $this->prix_du_bien;
    }

    public function setPrixDuBien(string $prix_du_bien): self
    {
        $this->prix_du_bien = $prix_du_bien;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }
    public function setImageFile($image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function getAchat(): ?Achat
    {
        return $this->achat;
    }

    public function setAchat(?Achat $achat): self
    {
        $this->achat = $achat;

        return $this;
    }

    public function getCandidature(): ?Candidature
    {
        return $this->candidature;
    }

    public function setCandidature(?Candidature $candidature): self
    {
        $this->candidature = $candidature;

        return $this;
    }

    public function getTypeDeBien(): ?TypeDeBien
    {
        return $this->typeDeBien;
    }

    public function setTypeDeBien(?TypeDeBien $typeDeBien): self
    {
        $this->typeDeBien = $typeDeBien;

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
            $projet->setBien($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getBien() === $this) {
                $projet->setBien(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nature_du_bien;
    }
}
