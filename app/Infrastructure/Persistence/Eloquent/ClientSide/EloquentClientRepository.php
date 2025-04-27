<?php

namespace App\Infrastructure\Persistence\Eloquent\ClientSide;
use App\Domain\ClientSide\Client;
use App\Domain\ClientSide\ClientRepository;
use App\Models\Client as ClientModel;

class EloquentClientRepository implements ClientRepository
{
    public function CreateClient(Client $client): void
    {
        $clientModel = ClientModel::find($client->getClientId()) ?? new ClientModel();
        $clientModel->client_id = $client->getClientId();
        $clientModel->binnie_id = $client->getBinnieId();
        $clientModel->first_name = $client->getFirstName();
        $clientModel->last_name = $client->getLastName();
        $clientModel->username = $client->getUsername();
        $clientModel->password = $client->getPassword();
        $clientModel->address = $client->getAddress();
        $clientModel->save();
    }
}