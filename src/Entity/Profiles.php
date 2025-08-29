<?php
namespace App\Entity;

class Profiles
{
    protected ?int $idProfile = null;
    protected string $labelProfile;

    /**
     * Get the value of idProfile
     */
    public function getIdProfile(): ?int
    {
        return $this->idProfile;
    }

    /**
     * Set the value of idProfile
     */
    public function setIdProfile(?int $idProfile): self
    {
        $this->idProfile = $idProfile;

        return $this;
    }

    /**
     * Get the value of labelProfile
     */
    public function getLabelProfile(): string
    {
        return $this->labelProfile;
    }

    /**
     * Set the value of labelProfile
     */
    public function setLabelProfile(string $labelProfile): self
    {
        $this->labelProfile = $labelProfile;

        return $this;
    }
}