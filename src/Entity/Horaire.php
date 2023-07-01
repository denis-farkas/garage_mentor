<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 255)]
    private ?string $debutMatin = null;

    #[ORM\Column(length: 255)]
    private ?string $finMatin = null;

    #[ORM\Column(length: 255)]
    private ?string $debutApresmidi = null;

    #[ORM\Column(length: 255)]
    private ?string $finApresmidi = null;

    #[ORM\Column]
    private ?bool $fermetureMatin = null;

    #[ORM\Column]
    private ?bool $fermetureApresmidi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getDebutMatin(): ?string
    {
        return $this->debutMatin;
    }

    public function setDebutMatin(string $debutMatin): static
    {
        $this->debutMatin = $debutMatin;

        return $this;
    }

    public function getFinMatin(): ?string
    {
        return $this->finMatin;
    }

    public function setFinMatin(string $finMatin): static
    {
        $this->finMatin = $finMatin;

        return $this;
    }

    public function getDebutApresmidi(): ?string
    {
        return $this->debutApresmidi;
    }

    public function setDebutApresmidi(string $debutApresmidi): static
    {
        $this->debutApresmidi = $debutApresmidi;

        return $this;
    }

    public function getFinApresmidi(): ?string
    {
        return $this->finApresmidi;
    }

    public function setFinApresmidi(string $finApresmidi): static
    {
        $this->finApresmidi = $finApresmidi;

        return $this;
    }

    public function isFermetureMatin(): ?bool
    {
        return $this->fermetureMatin;
    }

    public function setFermetureMatin(bool $fermetureMatin): static
    {
        $this->fermetureMatin = $fermetureMatin;

        return $this;
    }

    public function isFermetureApresmidi(): ?bool
    {
        return $this->fermetureApresmidi;
    }

    public function setFermetureApresmidi(bool $fermetureApresmidi): static
    {
        $this->fermetureApresmidi = $fermetureApresmidi;

        return $this;
    }
}
