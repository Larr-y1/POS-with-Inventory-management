<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'business_id'
    ];
    
    public function business(){
        return $this->belongsTo(Business::class)->withTrashed();
    }
    public function items(){
        return $this->hasMany(Item::class);
    }

}
