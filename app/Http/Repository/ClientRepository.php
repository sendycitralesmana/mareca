<?php

namespace App\Http\Repository;

use App\Models\Client;

class ClientRepository
{
    public function getAll()
    {
        return Client::get();
    }
}