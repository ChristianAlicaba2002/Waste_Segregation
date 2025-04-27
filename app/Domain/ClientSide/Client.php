<?php

namespace App\Domain\ClientSide;

class Client
{
    public function __construct(
        private int $client_id,
        private int $binnie_id,
        private string $first_name,
        private string $last_name,
        private string $username,
        private string $password,
        private string $address,
    )
    {
        $this->client_id = $client_id;
        $this->binnie_id = $binnie_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->password = $password;
        $this->address = $address;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function getBinnieId(): int
    {
        return $this->binnie_id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
}