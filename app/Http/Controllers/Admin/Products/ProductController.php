<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Models\Products\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        // $pro = SubCategory::with('product')->get();
        $pro = Product::with(['product_image', 'sub_category.category'])->get();
        return $pro;
    }

    public function add()
    {
        $categories = Category::all();

        return view('Admin.pages.newProduct', ['catges' => $categories]);
    }
}
