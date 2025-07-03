<?php

namespace App\Models;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_item_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
