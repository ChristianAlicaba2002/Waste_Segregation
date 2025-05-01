<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageSupport extends Model
{
    protected $table = 'message_support';
    protected $fillable = [
        'binnie_id',
        'first_name',
        'last_name',
        'username',
        'message',
        'support_id'
    ];
}
