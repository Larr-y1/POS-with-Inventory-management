<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function business()
    {
        return $this->hasOneThrough(Business::class, Sale::class)->withTrashed();
    }

    public function user(){
        return $this->hasOneThrough(User::class, Sale::class)->withTrashed();
    }

    public function customer(){
        return $this->hasOneThrough(Customer::class, Sale::class);
    }

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s');
    }
}
