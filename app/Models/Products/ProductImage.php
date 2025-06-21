<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    public $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
