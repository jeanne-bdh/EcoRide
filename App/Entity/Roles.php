<?php
namespace App\Entity;

class Roles
{
    protected ?int $idRole = null;
    protected string $labelRole;

    /**
     * Get the value of idRole
     */
    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    /**
     * Set the value of idRole
     */
    public function setIdRole(?int $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get the value of labelRole
     */
    public function getLabelRole(): string
    {
        return $this->labelRole;
    }

    /**
     * Set the value of labelRole
     */
    public function setLabelRole(string $labelRole): self
    {
        $this->labelRole = $labelRole;

        return $this;
    }
}