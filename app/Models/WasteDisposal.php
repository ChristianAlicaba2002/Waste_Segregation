<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteDisposal extends Model
{
    
    protected $table = 'waste_disposal';
    protected $primaryKey = 'disposal_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'disposal_id',
        'item_id',
        'record_id',
        'facility_id',
        'disposal_time'
    ];
}
