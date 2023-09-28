<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $avis_note = null;

    #[ORM\Column(length: 255)]
    private ?string $avis_commentaire = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvisNote(): ?int
    {
        return $this->avis_note;
    }

    public function setAvisNote(int $avis_note): static
    {
        $this->avis_note = $avis_note;

        return $this;
    }

    public function getAvisCommentaire(): ?string
    {
        return $this->avis_commentaire;
    }

    public function setAvisCommentaire(string $avis_commentaire): static
    {
        $this->avis_commentaire = $avis_commentaire;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateurId(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
