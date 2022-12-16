<?php

namespace App\Entity;

use App\Repository\EnclosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnclosRepository::class)
 */
class Enclos
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
    private $Nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Superficie;



    /**
     * @ORM\Column(type="boolean")
     */
    private $Quarantaine;

    /**
     * @ORM\ManyToOne(targetEntity=Espace::class, inversedBy="enclos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_espace;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxIndividus;

    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="Enclos", orphanRemoval=true)
     */
    private $animaux;

    public function __construct()
    {
        $this->animaux = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->Superficie;
    }

    public function setSuperficie(int $Superficie): self
    {
        $this->Superficie = $Superficie;

        return $this;
    }



    public function isQuarantaine(): ?bool
    {
        return $this->Quarantaine;
    }

    public function setQuarantaine(bool $Quarantaine): self
    {
        $this->Quarantaine = $Quarantaine;

        return $this;
    }

    public function getIdEspace(): ?Espace
    {
        return $this->Id_espace;
    }

    public function setIdEspace(?Espace $Id_espace): self
    {
        $this->Id_espace = $Id_espace;

        return $this;
    }

    public function getMaxIndividus(): ?int
    {
        return $this->maxIndividus;
    }

    public function setMaxIndividus(int $maxIndividus): self
    {
        $this->maxIndividus = $maxIndividus;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

    public function addAnimaux(Animal $animaux): self
    {
        if (!$this->animaux->contains($animaux)) {
            $this->animaux[] = $animaux;
            $animaux->setEnclos($this);
        }

        return $this;
    }

    public function removeAnimaux(Animal $animaux): self
    {
        if ($this->animaux->removeElement($animaux)) {
            // set the owning side to null (unless already changed)
            if ($animaux->getEnclos() === $this) {
                $animaux->setEnclos(null);
            }
        }

        return $this;
    }


}
