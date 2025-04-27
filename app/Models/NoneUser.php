<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoneUser extends Model
{
    protected $table = 'none_user';
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'message',
        'support_id'
    ];
}
