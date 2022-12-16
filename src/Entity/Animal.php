<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
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
     * @ORM\Column(type="boolean")
     */
    private $Proprietaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Espece;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Sterilise;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Quarantaine;

    /**
     * @ORM\ManyToOne(targetEntity=Enclos::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Enclos;

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

    public function isProprietaire(): ?bool
    {
        return $this->Proprietaire;
    }

    public function setProprietaire(bool $Proprietaire): self
    {
        $this->Proprietaire = $Proprietaire;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->Espece;
    }

    public function setEspece(string $Espece): self
    {
        $this->Espece = $Espece;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function isSterilise(): ?bool
    {
        return $this->Sterilise;
    }

    public function setSterilise(bool $Sterilise): self
    {
        $this->Sterilise = $Sterilise;

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

    public function getEnclos(): ?Enclos
    {
        return $this->Enclos;
    }

    public function setEnclos(?Enclos $Enclos): self
    {
        $this->Enclos = $Enclos;

        return $this;
    }
}
