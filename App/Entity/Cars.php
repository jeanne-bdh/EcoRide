<?php
namespace App\Entity;

use DateTimeImmutable;

class Cars
{
    protected ?int $idCar = null;
    protected string $model;
    protected string $brand;
    protected string $color;
    protected string $nbPlate;
    protected DateTimeImmutable $firstRegist;
    protected int $seatsNb;
    protected string $smoker;
    protected string $animal;
    protected ?string $preferences = null;
    protected Energies $energy;
    protected Users $user;
    protected ?TravelTypes $travelType = null;

    /**
     * Get the value of idCar
     */
    public function getidCar(): ?int
    {
        return $this->idCar;
    }

    /**
     * Set the value of idCar
     */
    public function setidCar(?int $idCar): self
    {
        $this->idCar = $idCar;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * Set the value of model
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of brand
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of nbPlate
     */
    public function getNbPlate(): string
    {
        return $this->nbPlate;
    }

    /**
     * Set the value of nbPlate
     */
    public function setNbPlate(string $nbPlate): self
    {
        $this->nbPlate = $nbPlate;

        return $this;
    }

    /**
     * Get the value of firstRegist
     */
    public function getFirstRegist(): DateTimeImmutable
    {
        return $this->firstRegist;
    }

    /**
     * Set the value of firstRegist
     */
    public function setFirstRegist(DateTimeImmutable $firstRegist): self
    {
        $this->firstRegist = $firstRegist;

        return $this;
    }

    /**
     * Get the value of seatsNb
     */
    public function getSeatsNb(): int
    {
        return $this->seatsNb;
    }

    /**
     * Set the value of seatsNb
     */
    public function setSeatsNb(int $seatsNb): self
    {
        $this->seatsNb = $seatsNb;

        return $this;
    }

    /**
     * Get the value of smoker
     */
    public function getSmoker(): string
    {
        return $this->smoker;
    }

    /**
     * Set the value of smoker
     */
    public function setSmoker(string $smoker): self
    {
        $this->smoker = $smoker;

        return $this;
    }

    /**
     * Get the value of animal
     */
    public function getAnimal(): string
    {
        return $this->animal;
    }

    /**
     * Set the value of animal
     */
    public function setAnimal(string $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get the value of preferences
     */
    public function getPreferences(): ?string
    {
        return $this->preferences;
    }

    /**
     * Set the value of preferences
     */
    public function setPreferences(?string $preferences): self
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get the value of energy
     */
    public function getEnergy(): Energies
    {
        return $this->energy;
    }

    /**
     * Set the value of energy
     */
    public function setEnergy(Energies $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser(Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of travelType
     */
    public function getTravelType(): ?TravelTypes
    {
        return $this->travelType;
    }

    /**
     * Set the value of travelType
     */
    public function setTravelType(?TravelTypes $travelType): self
    {
        $this->travelType = $travelType;

        return $this;
    }
}