<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrashBinnie extends Model
{
    protected $table = 'trash_binnie';
    protected $primaryKey = 'trash_binnie_id';

    protected $fillable = [
        'trash_binnie_id'
    ];
}
