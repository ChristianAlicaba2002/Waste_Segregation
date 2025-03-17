<?php

namespace App\Domain\ClientSide;

class Client
{
    public function __construct(
        private string $client_id,
        private string $first_name,
        private string $last_name,
        private string $username,
        private string $password,
    )
    {
        $this->client_id = $client_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getClientId(): string
    {
        return $this->client_id;
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
    
}