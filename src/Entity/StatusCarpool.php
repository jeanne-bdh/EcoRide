<?php
namespace App\Entity;

class StatusCarpool extends Entity
{
    protected ?int $idStatusCarpool = null;
    protected string $labelStatusCarpool;

    /**
     * Get the value of idStatusCarpool
     */
    public function getIdStatusCarpool(): ?int
    {
        return $this->idStatusCarpool;
    }

    /**
     * Set the value of idStatusCarpool
     */
    public function setIdStatusCarpool(?int $idStatusCarpool): self
    {
        $this->idStatusCarpool = $idStatusCarpool;

        return $this;
    }

    /**
     * Get the value of labelStatusCarpool
     */
    public function getLabelStatusCarpool(): string
    {
        return $this->labelStatusCarpool;
    }

    /**
     * Set the value of labelStatusCarpool
     */
    public function setLabelStatusCarpool(string $labelStatusCarpool): self
    {
        $this->labelStatusCarpool = $labelStatusCarpool;

        return $this;
    }
}