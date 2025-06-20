<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class);
    }
}
