<?php

namespace App\Http\Controllers;

use App\Models\Products\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{

    public function shop(Request $request)
    {
        $product = new Product();
        $product  = Product::with('sub_category.category', 'product_image')->simplePaginate(20);

        return view('mainshop', ['product' => $product]);
    }
}
