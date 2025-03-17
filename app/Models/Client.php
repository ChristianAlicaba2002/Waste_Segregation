<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'username',
        'password',
    ];
}
