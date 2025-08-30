<?php
namespace App\Entity;

class Energies extends Entity
{
    protected ?int $idEnergy = null;
    protected ?string $labelEnergy = null;

    /**
     * Get the value of idEnergy
     */
    public function getIdEnergy(): ?int
    {
        return $this->idEnergy;
    }

    /**
     * Set the value of idEnergy
     */
    public function setIdEnergy(?int $idEnergy): self
    {
        $this->idEnergy = $idEnergy;

        return $this;
    }

    /**
     * Get the value of labelEnergy
     */
    public function getLabelEnergy(): ?string
    {
        return $this->labelEnergy;
    }

    /**
     * Set the value of labelEnergy
     */
    public function setLabelEnergy(?string $labelEnergy): self
    {
        $this->labelEnergy = $labelEnergy;

        return $this;
    }
}