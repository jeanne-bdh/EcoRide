<?php
namespace App\Entity;

use DateTime;

class Carpools extends Entity
{
    protected ?int $idCarpool = null;
    protected DateTime $dateDepart;
    protected DateTime $timeDepart;
    protected DateTime $timeArrival;
    protected string $localisationDepart;
    protected string $localisationArrival;
    protected ?int $remainingSeat = null;
    protected int $price;
    protected StatusCarpool $statusCarpool;
    protected Cars $car;

    /**
     * Get the value of idCarpool
     */
    public function getIdCarpool(): ?int
    {
        return $this->idCarpool;
    }

    /**
     * Set the value of idCarpool
     */
    public function setIdCarpool(?int $idCarpool): self
    {
        $this->idCarpool = $idCarpool;

        return $this;
    }

    /**
     * Get the value of dateDepart
     */
    public function getDateDepart(): DateTime
    {
        return $this->dateDepart;
    }

    /**
     * Set the value of dateDepart
     */
    public function setDateDepart(DateTime $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get the value of timeDepart
     */
    public function getTimeDepart(): DateTime
    {
        return $this->timeDepart;
    }

    /**
     * Set the value of timeDepart
     */
    public function setTimeDepart(DateTime $timeDepart): self
    {
        $this->timeDepart = $timeDepart;

        return $this;
    }

    /**
     * Get the value of timeArrival
     */
    public function getTimeArrival(): DateTime
    {
        return $this->timeArrival;
    }

    /**
     * Set the value of timeArrival
     */
    public function setTimeArrival(DateTime $timeArrival): self
    {
        $this->timeArrival = $timeArrival;

        return $this;
    }

    /**
     * Get the value of localisationDepart
     */
    public function getLocalisationDepart(): string
    {
        return $this->localisationDepart;
    }

    /**
     * Set the value of localisationDepart
     */
    public function setLocalisationDepart(string $localisationDepart): self
    {
        $this->localisationDepart = $localisationDepart;

        return $this;
    }

    /**
     * Get the value of localisationArrival
     */
    public function getLocalisationArrival(): string
    {
        return $this->localisationArrival;
    }

    /**
     * Set the value of localisationArrival
     */
    public function setLocalisationArrival(string $localisationArrival): self
    {
        $this->localisationArrival = $localisationArrival;

        return $this;
    }

    /**
     * Get the value of remainingSeat
     */
    public function getRemainingSeat(): ?int
    {
        return $this->remainingSeat;
    }

    /**
     * Set the value of remainingSeat
     */
    public function setRemainingSeat(?int $remainingSeat): self
    {
        $this->remainingSeat = $remainingSeat;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of statusCarpool
     */
    public function getStatusCarpool(): StatusCarpool
    {
        return $this->statusCarpool;
    }

    /**
     * Set the value of statusCarpool
     */
    public function setStatusCarpool(StatusCarpool $statusCarpool): self
    {
        $this->statusCarpool = $statusCarpool;

        return $this;
    }

    /**
     * Get the value of car
     */
    public function getCar(): Cars
    {
        return $this->car;
    }

    /**
     * Set the value of car
     */
    public function setCar(Cars $car): self
    {
        $this->car = $car;

        return $this;
    }
}