<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Models\Products\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function submit_add(Request $request)
    {

        $data = $request->validate([

            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|integer|exists:categories,id',
            'sub_category' => 'required|integer|exists:sub_categories,id',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',

            'cover' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_image1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_image2' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_image3' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_image4' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'product_image5' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',


        ]);
        if (!$data) {
            return redirect()->route('admin.product.add');
        } else {

            $product = new Product();

            $product->name = $request->title;
            $product->slug = Str::slug($request->title);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = null;
            $product->quantity = $request->quantity;
            $product->sub_category_id = $request->sub_category;
            $product->created_at = now();
            $product->updated_at = now();
            $product->save();

            $cover = uniqid() . '_' . $request->file('cover')->getClientOriginalName();
            $fileName1 = uniqid() . '_' . $request->file('product_image1')->getClientOriginalName();
            $fileName2 = uniqid() . '_' . $request->file('product_image2')->getClientOriginalName();
            $fileName3 = uniqid() . '_' . $request->file('product_image3')->getClientOriginalName();

            $coverPath = $request->cover->storeAs('uploads/product', $cover, 'public');
            $path1 = $request->cover->storeAs('uploads/product', $fileName1, 'public');
            $path2 = $request->cover->storeAs('uploads/product', $fileName2, 'public');
            $path3 = $request->cover->storeAs('uploads/product', $fileName3, 'public');
            $path4 = null;
            $path5 = null;
            if ($request->hasFile('product_image4') && $request->file('product_image4')->isValid()) {
                $fileName4 = uniqid() . '_' . $request->file('product_image4')->getClientOriginalName();
                $path4 = $request->cover->storeAs('uploads/product', $fileName4, 'public');
            }
            if ($request->hasFile('product_image5') && $request->file('product_image5')->isValid()) {
                $fileName5 = uniqid() . '_' . $request->file('product_image5')->getClientOriginalName();
                $path5 = $request->cover->storeAs('uploads/product', $fileName5, 'public');
            }

            $product->product_image()->create([
                'coverImage' => $coverPath,
                'supportImg1' => $path1,
                'supportImg2' => $path2,
                'supportImg3' => $path3,
                'supportImg4' => $path4,
                'supportImg5' => $path5,

            ]);
            return redirect()->route('admin.dashboard');
        }
    }
}
