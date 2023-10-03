<?php

namespace App\Entity;

use App\Repository\ChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapitresRepository::class)]
class Chapitres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $chapitre_titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $chapitre_contenu = null;

    #[ORM\Column]
    private ?int $chapitre_position = null;

    #[ORM\ManyToOne(inversedBy: 'chapitres')]
    private ?Cours $cours = null;

    #[ORM\ManyToMany(targetEntity: UtilisateursChapitres::class, mappedBy: 'chapitre')]
    private Collection $utilisateursChapitres;

    public function __construct()
    {
        $this->utilisateursChapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapitreTitre(): ?string
    {
        return $this->chapitre_titre;
    }

    public function setChapitreTitre(string $chapitre_titre): static
    {
        $this->chapitre_titre = $chapitre_titre;

        return $this;
    }

    public function getChapitreContenu(): ?string
    {
        return $this->chapitre_contenu;
    }

    public function setChapitreContenu(string $chapitre_contenu): static
    {
        $this->chapitre_contenu = $chapitre_contenu;

        return $this;
    }

    public function getChapitrePosition(): ?int
    {
        return $this->chapitre_position;
    }

    public function setChapitrePosition(int $chapitre_position): static
    {
        $this->chapitre_position = $chapitre_position;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): static
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * @return Collection<int, UtilisateursChapitres>
     */
    public function getUtilisateursChapitres(): Collection
    {
        return $this->utilisateursChapitres;
    }

    public function addUtilisateursChapitre(UtilisateursChapitres $utilisateursChapitre): static
    {
        if (!$this->utilisateursChapitres->contains($utilisateursChapitre)) {
            $this->utilisateursChapitres->add($utilisateursChapitre);
            $utilisateursChapitre->addChapitre($this);
        }

        return $this;
    }

    public function removeUtilisateursChapitre(UtilisateursChapitres $utilisateursChapitre): static
    {
        if ($this->utilisateursChapitres->removeElement($utilisateursChapitre)) {
            $utilisateursChapitre->removeChapitre($this);
        }

        return $this;
    }
}
