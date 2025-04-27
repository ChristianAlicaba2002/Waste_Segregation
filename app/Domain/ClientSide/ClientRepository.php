<?php

namespace App\Domain\ClientSide;

interface ClientRepository
{
    public function CreateClient(Client $client): void;
    public function updateClient(Client $client): void;
}