<?php

namespace App\Domain\ClientSide;

class Client
{
    public function __construct(
        private int $client_id,
        private int $binnie_id,
        private string $first_name,
        private string $last_name,
        private string $city,
        private string $barangay,
        private string $purok,
        private string $username,
        private string $password,
    ) {
        $this->client_id = $client_id;
        $this->binnie_id = $binnie_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city = $city;
        $this->barangay = $barangay;
        $this->purok = $purok;
        $this->username = $username;
        $this->password = $password;
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

    public function getCity(): string
    {
        return $this->city;
    }


    public function getBarangay(): string
    {
        return $this->barangay;
    }


    public function getPurok(): string
    {
        return $this->purok;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
