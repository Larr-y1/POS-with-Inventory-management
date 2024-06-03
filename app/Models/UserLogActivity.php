<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'device',
        'browser',
        'login_at',
        'platform'
    
    ];
    public function user(){
        return $this->hasMany(User::class)->withThrashed();
       }  

     
}

