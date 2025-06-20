<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::get(path: 'database/json/subcat.json');
        $categories = collect(json_decode($file));

        foreach ($categories as $cat) {
            SubCategory::create([
                'name' => $cat->name,
                'img' => $cat->image,
                'category_id' => $cat->category_id,
            ]);
        }
    }
}
