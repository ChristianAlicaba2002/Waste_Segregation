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

    public function CreateClient(string $client_id , string $first_name , string $last_name , string $username , string $password)
    {
        $Register = new Client($client_id , $first_name , $last_name , $username , $password);

        $this->clientRepository->CreateClient($Register);
    }

}