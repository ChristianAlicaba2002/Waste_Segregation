<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clients';
    protected $guard = 'client';
    
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'username',
        'password',
    ];
}
