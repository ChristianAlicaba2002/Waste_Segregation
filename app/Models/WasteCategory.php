<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    protected $table = 'waste_category';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_id', 'category_name'];
    public $timestamps = false;
}
