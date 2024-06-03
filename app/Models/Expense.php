<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
   protected $fillable = [
    'business_id',
    'user_id',
    'expense_type',
    'amount',
    'payment_method',
    'beneficiary',
    'status'
   ];

    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
