<?php

namespace App\Entity;

class CarpoolsUsers
{
    protected Carpools $idCarpool;
    protected Users $idUsers;
    protected ?string $roleInCarpool = null;
    protected ?string $statusInCarpool = null;

    /**
     * Get the value of idCarpool
     */
    public function getIdCarpool(): Carpools
    {
        return $this->idCarpool;
    }

    /**
     * Set the value of idCarpool
     */
    public function setIdCarpool(Carpools $idCarpool): self
    {
        $this->idCarpool = $idCarpool;

        return $this;
    }

    /**
     * Get the value of idUsers
     */
    public function getIdUsers(): Users
    {
        return $this->idUsers;
    }

    /**
     * Set the value of idUsers
     */
    public function setIdUsers(Users $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * Get the value of roleInCarpool
     */
    public function getRoleInCarpool(): ?string
    {
        return $this->roleInCarpool;
    }

    /**
     * Set the value of roleInCarpool
     */
    public function setRoleInCarpool(?string $roleInCarpool): self
    {
        $this->roleInCarpool = $roleInCarpool;

        return $this;
    }

    /**
     * Get the value of statusInCarpool
     */
    public function getStatusInCarpool(): ?string
    {
        return $this->statusInCarpool;
    }

    /**
     * Set the value of statusInCarpool
     */
    public function setStatusInCarpool(?string $statusInCarpool): self
    {
        $this->statusInCarpool = $statusInCarpool;

        return $this;
    }
}