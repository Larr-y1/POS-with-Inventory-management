<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOpeningClosingStock extends Model
{
    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
