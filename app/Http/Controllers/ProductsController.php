<?php

namespace App\Http\Controllers;

use App\Models\Products\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{

    public function shop(Request $request)
    {
        // $product = new Product();
        // $product  = Product::with('sub_category.category', 'product_image')->simplePaginate(20);

        return view('mainshop');
    }
    // ---------------------- 
    public function filter(Request $request)
    {

        $ids  = $request->ids;
        $i = $request->i;
        if ($ids) {
            // $pro = SubCategory::with('product')->get();

            // fetch the products
            $pro = Product::whereHas('sub_category.category', function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            })->with(['product_image', 'sub_category.category'])->get();


            // sort by price and category 

            if ($i === 0) {
                $pro = $pro->sortBy(function ($product) use ($ids) {
                    return array_search($product->sub_category->category->id, $ids);
                })->sortBy(function ($product) {
                    return $product->discount_price > 0 ? $product->discount_price : $product->price;
                })->values();
            } else if ($i === 1) {
                $pro = $pro->sortBy(function ($product) use ($ids) {
                    return array_search($product->sub_category->category->id, $ids);
                })->sortByDesc(function ($product) {
                    return $product->discount_price > 0 ? $product->discount_price : $product->price;
                })->values();
            } else {
                $pro = $pro->sortBy(function ($product) use ($ids) {
                    return array_search($product->sub_category->category->id, $ids);
                })->values();
            }


            // render the view
            $html = view('productHtml', ['product' => $pro])->render();
            // return the response 
            return response()->json(['html' => $html]);
        } else {
            $pro = Product::with(['product_image', 'sub_category.category'])->get();
            // $count  = Product::count();

            if ($i === 0) {
                $pro = $pro->sortBy(function ($product) {
                    return $product->discount_price > 0 ? $product->discount_price : $product->price;
                })->values();
            } else if ($i === 1) {
                $pro = $pro->sortByDesc(function ($product) {
                    return $product->discount_price > 0 ? $product->discount_price : $product->price;
                })->values();
            } else {
            }

            $html = view('productHtml', ['product' => $pro])->render();
            return response()->json(['html' => $html]);
        }
    }
}
