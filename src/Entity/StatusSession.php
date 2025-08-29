<?php
namespace App\Entity;

class StatusSession
{
    protected ?int $idStatusSession = null;
    protected string $labelStatusSession;

    /**
     * Get the value of idStatusSession
     */
    public function getIdStatusSession(): ?int
    {
        return $this->idStatusSession;
    }

    /**
     * Set the value of idStatusSession
     */
    public function setIdStatusSession(?int $idStatusSession): self
    {
        $this->idStatusSession = $idStatusSession;

        return $this;
    }

    /**
     * Get the value of labelStatusSession
     */
    public function getLabelStatusSession(): string
    {
        return $this->labelStatusSession;
    }

    /**
     * Set the value of labelStatusSession
     */
    public function setLabelStatusSession(string $labelStatusSession): self
    {
        $this->labelStatusSession = $labelStatusSession;

        return $this;
    }
}