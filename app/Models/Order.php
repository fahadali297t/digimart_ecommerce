<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function order_item()
    {
        return $this->hasMany(OrderItem::class);
    }
}
