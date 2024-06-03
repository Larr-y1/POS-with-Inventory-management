<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [
        
    ];
    
    public function business(){
        return $this->belongsTo(Business::class)->withTrashed();
    }

    public function sales(){
        return $this->hasMany(Sale::class)->withTrashed();
    }
}
