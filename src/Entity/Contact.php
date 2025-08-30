<?php
namespace App\Entity;

use DateTimeImmutable;

class Contact extends Entity
{
    protected ?int $idContact = null;
    protected string $title;
    protected string $email;
    protected string $message;
    protected DateTimeImmutable $dateContact;

    /**
     * Get the value of idContact
     */
    public function getIdContact(): ?int
    {
        return $this->idContact;
    }

    /**
     * Set the value of idContact
     */
    public function setIdContact(?int $idContact): self
    {
        $this->idContact = $idContact;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        if (strlen($title) > 50) {
            throw new \InvalidArgumentException("Le titre ne peut pas dépasser 50 caractères");
        }

        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of dateContact
     */
    public function getDateContact(): DateTimeImmutable
    {
        return $this->dateContact;
    }

    /**
     * Set the value of dateContact
     */
    public function setDateContact(DateTimeImmutable $dateContact): self
    {
        $this->dateContact = $dateContact;

        return $this;
    }
}