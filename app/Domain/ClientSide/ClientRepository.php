<?php

namespace App\Domain\ClientSide;

interface ClientRepository
{
    public function CreateClient(Client $client): void;
}