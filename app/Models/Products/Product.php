<?php

namespace App\Models\Products;

use App\Models\OrderItem;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function product_image()
    {
        return $this->hasOne(ProductImage::class);
    }
    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class, 'order_item_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
