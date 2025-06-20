<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::get(path: 'database/json/cat.json');
        $categories = collect(json_decode($file));

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat->name,
                'img' => $cat->image
            ]);
        }
    }
}
