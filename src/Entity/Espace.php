<?php

namespace App\Entity;

use App\Repository\EspaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspaceRepository::class)
 */
class Espace
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
     * @ORM\OneToMany(targetEntity=Enclos::class, mappedBy="Id_espace", orphanRemoval=true)
     */
    private $enclos;

    public function __construct()
    {
        $this->enclos = new ArrayCollection();
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


    /**
     * @return Collection<int, Enclos>
     */
    public function getEnclos(): Collection
    {
        return $this->enclos;
    }

    public function addEnclo(Enclos $enclo): self
    {
        if (!$this->enclos->contains($enclo)) {
            $this->enclos[] = $enclo;
            $enclo->setIdEspace($this);
        }

        return $this;
    }

    public function removeEnclo(Enclos $enclo): self
    {
        if ($this->enclos->removeElement($enclo)) {
            // set the owning side to null (unless already changed)
            if ($enclo->getIdEspace() === $this) {
                $enclo->setIdEspace(null);
            }
        }

        return $this;
    }
}
