<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'business_id',
        'user_id',
        'item_type',
        'barcode',
        'selling_price',
        'purchase_price',
        'sku',
        'quantity',
        'low_stock_count',
        'category_id'
    ];
    protected $guarded = [];
    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function item_stock_logs(){
        return $this->hasMany(ItemStockLog::class)->withTrashed();
    }

    public function sale_items(){
        return $this->hasMany(SaleItem::class)->withTrashed();
    }

}
