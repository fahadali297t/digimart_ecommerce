<?php

namespace Database\Seeders;

use App\Models\Products\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file  = File::get(path: "database/json/pimg.json");
        $product = collect(json_decode($file));
        foreach ($product as $pro) {
            ProductImage::create([
                'product_id' => $pro->product_id,
                'coverImage' => $pro->coverImage,
                'supportImg1' => $pro->supportImg1,
                'supportImg2' => $pro->supportImg2,
                'supportImg3' => $pro->supportImg3,
                'supportImg4' => $pro->supportImg4,
                'supportImg5' => $pro->supportImg5,
            ]);
        }
    }
}
