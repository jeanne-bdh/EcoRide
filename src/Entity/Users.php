<?php

namespace App\Entity;

class Users extends Entity
{
    protected ?int $idUsers = null;
    protected string $pseudo;
    protected string $email;
    protected string $password;
    protected ?string $photo = null;
    protected ?string $telephone = null;
    protected ?string $address = null;
    protected ?string $lastname = null;
    protected ?string $firstname = null;
    protected int $credit;
    protected Roles $role;
    protected ?Profiles $profile = null;
    protected StatusSession $statusSession;

    /**
     * Get the value of idUsers
     */
    public function getIdUsers(): ?int
    {
        return $this->idUsers;
    }

    /**
     * Set the value of idUsers
     */
    public function setIdUsers(?int $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo(string $pseudo): self
    {
        if (strlen($pseudo) > 50) {
            throw new \InvalidArgumentException("Le pseudo ne peut pas dépasser 50 caractères");
        }
        $this->pseudo = $pseudo;

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
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone(?string $telephone): self
    {
        if (strlen($telephone) > 60) {
            throw new \InvalidArgumentException("Le numéro de téléphone ne peut pas dépasser 20 caractères");
        }

        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(?string $lastname): self
    {
        if (strlen($lastname) > 50) {
            throw new \InvalidArgumentException("Le nom ne peut pas dépasser 50 caractères");
        }

        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname(?string $firstname): self
    {
        if (strlen($firstname) > 50) {
            throw new \InvalidArgumentException("Le prénom ne peut pas dépasser 50 caractères");
        }

        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of credit
     */
    public function getCredit(): int
    {
        return $this->credit;
    }

    /**
     * Set the value of credit
     */
    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole(): Roles
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole(Roles $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of profile
     */
    public function getProfile(): ?Profiles
    {
        return $this->profile;
    }

    /**
     * Set the value of profile
     */
    public function setProfile(?Profiles $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get the value of statusSession
     */
    public function getStatusSession(): StatusSession
    {
        return $this->statusSession;
    }

    /**
     * Set the value of statusSession
     */
    public function setStatusSession(StatusSession $statusSession): self
    {
        $this->statusSession = $statusSession;

        return $this;
    }
}
