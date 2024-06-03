<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory,  SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'phone_number',
        'email',
        'address',
        'user_id',
        'website'
    ];

 
    /*public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }*/

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function sales(){
        return $this->hasMany(Sale::class)->withTrashed();
    }
    public function items(){
        return $this->hasMany(Item::class)->withTrashed();
    }


}
