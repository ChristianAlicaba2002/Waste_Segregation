<?php

namespace App\Application\ClientSide;


use App\Domain\ClientSide\ClientRepository;
use App\Domain\ClientSide\Client;


class RegisterClient
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
         $this->clientRepository = $clientRepository;
    }

    public function CreateClient(int $client_id , int $binnie_id , string $first_name , string $last_name  , string $city, string $barangay, string $purok, string $username , string $password )
    {
        $Register = new Client($client_id , $binnie_id, $first_name , $last_name , $city, $barangay , $purok , $username , $password);

        $this->clientRepository->CreateClient($Register);
    }

    public function UpdateClient(int $client_id , int $binnie_id , string $first_name , string $last_name  , string $city, string $barangay, string $purok, string $username , string $password )
    {
        $Register = new Client($client_id , $binnie_id, $first_name , $last_name , $city, $barangay , $purok , $username , $password);

        $this->clientRepository->UpdateClient($Register);
    }
}