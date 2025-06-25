<?php

namespace Database\Seeders;

use App\Models\Products\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file  = File::get(path: "database/json/product.json");
        $product = collect(json_decode($file));
        foreach ($product as $pro) {
            Product::create([
                'name' => $pro->name,
                'slug' => $pro->slug,
                'description' => $pro->description,
                'price' => $pro->price,
                'discount_price' => $pro->discount_price,
                'quantity' => $pro->quantity,
                'sub_category_id' => $pro->sub_category_id,
            ]);
        }
    }
}
