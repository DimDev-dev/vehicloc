<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $priceMonth = null;

    #[ORM\Column]
    private ?int $priceDays = null;

    #[ORM\Column]
    private ?int $numberPlaces = null;

    #[ORM\Column]
    private ?bool $isAutomatic = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceMonth(): ?int
    {
        return $this->priceMonth;
    }

    public function setPriceMonth(int $priceMonth): static
    {
        $this->priceMonth = $priceMonth;

        return $this;
    }

    public function getPriceDays(): ?int
    {
        return $this->priceDays;
    }

    public function setPriceDays(int $priceDays): static
    {
        $this->priceDays = $priceDays;

        return $this;
    }

    public function getNumberPlaces(): ?int
    {
        return $this->numberPlaces;
    }

    public function setNumberPlaces(int $numberPlaces): static
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    public function isAutomatic(): ?bool
    {
        return $this->isAutomatic;
    }

    public function setAutomatic(bool $isAutomatic): static
    {
        $this->isAutomatic = $isAutomatic;

        return $this;
    }
}
