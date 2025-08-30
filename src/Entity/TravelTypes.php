<?php
namespace App\Entity;

class TravelTypes extends Entity
{
    protected ?int $idTravelType = null;
    protected string $labelTravelType;

    /**
     * Get the value of idTravelType
     */
    public function getIdTravelType(): ?int
    {
        return $this->idTravelType;
    }

    /**
     * Set the value of idTravelType
     */
    public function setIdTravelType(?int $idTravelType): self
    {
        $this->idTravelType = $idTravelType;

        return $this;
    }

    /**
     * Get the value of labelTravelType
     */
    public function getLabelTravelType(): string
    {
        return $this->labelTravelType;
    }

    /**
     * Set the value of labelTravelType
     */
    public function setLabelTravelType(string $labelTravelType): self
    {
        $this->labelTravelType = $labelTravelType;

        return $this;
    }
}