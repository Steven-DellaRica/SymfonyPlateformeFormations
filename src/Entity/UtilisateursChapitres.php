<?php

namespace App\Entity;

use App\Repository\UtilisateursChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateursChapitresRepository::class)]
class UtilisateursChapitres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $utilisateur_chapitre_date_inscription = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $utilisateur_chapitre_termine = null;

    #[ORM\ManyToOne]
    private ?User $utilisateur = null;

    #[ORM\ManyToMany(targetEntity: chapitres::class, inversedBy: 'utilisateursChapitres')]
    private Collection $chapitre;

    public function __construct()
    {
        $this->chapitre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurChapitreDateInscription(): ?\DateTimeInterface
    {
        return $this->utilisateur_chapitre_date_inscription;
    }

    public function setUtilisateurChapitreDateInscription(\DateTimeInterface $utilisateur_chapitre_date_inscription): static
    {
        $this->utilisateur_chapitre_date_inscription = $utilisateur_chapitre_date_inscription;

        return $this;
    }

    public function getUtilisateurChapitreTermine(): ?int
    {
        return $this->utilisateur_chapitre_termine;
    }

    public function setUtilisateurChapitreTermine(int $utilisateur_chapitre_termine): static
    {
        $this->utilisateur_chapitre_termine = $utilisateur_chapitre_termine;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, chapitres>
     */
    public function getChapitre(): Collection
    {
        return $this->chapitre;
    }

    public function addChapitre(chapitres $chapitre): static
    {
        if (!$this->chapitre->contains($chapitre)) {
            $this->chapitre->add($chapitre);
        }

        return $this;
    }

    public function removeChapitre(chapitres $chapitre): static
    {
        $this->chapitre->removeElement($chapitre);

        return $this;
    }
}
