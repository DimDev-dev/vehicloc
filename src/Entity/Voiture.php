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
    private ?float $priceMonth = null;

    #[ORM\Column]
    private ?float $priceDays = null;

    #[ORM\Column]
    private ?int $numberPlaces = null;

    #[ORM\Column]
    private ?string $isAutomatic = null;

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

    public function getPriceMonth(): ?float
    {
        return $this->priceMonth;
    }

    public function setPriceMonth(float $priceMonth): static
    {
        $this->priceMonth = $priceMonth;

        return $this;
    }

    public function getPriceDays(): ?float
    {
        return $this->priceDays;
    }

    public function setPriceDays(float $priceDays): static
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

    public function getIsAutomatic(): ?string
    {
        return $this->isAutomatic;
    }

    public function setIsAutomatic(string $isAutomatic): static
    {
        $this->isAutomatic = $isAutomatic;

        return $this;
    }
}
