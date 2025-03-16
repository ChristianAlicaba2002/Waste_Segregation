<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteItem extends Model
{
    protected $table = 'waste_item';
    protected $primaryKey = 'item_id';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'category_id',
       ' item_category',
       ' item_segregated',
    ];
}
