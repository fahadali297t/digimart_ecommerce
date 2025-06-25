<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Models\Products\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function list()
    {
        // $pro = SubCategory::with('product')->get();

        $pro = Product::orderBy('id')->with(['product_image', 'sub_category.category'])->simplePaginate(10);
        $count  = Product::count();
        return view('Admin.pages.product.products', ['products' => $pro, 'count' => $count]);
    }
    public function jsonlist()
    {
        // $pro = SubCategory::with('product')->get();

        $pro = Product::with(['product_image', 'sub_category.category'])->simplePaginate(10);
        $count  = Product::count();
        return $pro;
    }

    public function add()
    {
        $categories = Category::all();

        return view('Admin.pages.product.newProduct', ['catges' => $categories]);
    }

    public function getSubCategories($category_id)
    {
        $subCategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json($subCategories);
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
            $path1 = $request->product_image1->storeAs('uploads/product', $fileName1, 'public');
            $path2 = $request->product_image2->storeAs('uploads/product', $fileName2, 'public');
            $path3 = $request->product_image3->storeAs('uploads/product', $fileName3, 'public');
            $path4 = null;
            $path5 = null;
            if ($request->hasFile('product_image4') && $request->file('product_image4')->isValid()) {
                $fileName4 = uniqid() . '_' . $request->file('product_image4')->getClientOriginalName();
                $path4 = $request->product_image4->storeAs('uploads/product', $fileName4, 'public');
            }
            if ($request->hasFile('product_image5') && $request->file('product_image5')->isValid()) {
                $fileName5 = uniqid() . '_' . $request->file('product_image5')->getClientOriginalName();
                $path5 = $request->product_image5->storeAs('uploads/product', $fileName5, 'public');
            }

            $product->product_image()->create([
                'coverImage' => $coverPath,
                'supportImg1' => $path1,
                'supportImg2' => $path2,
                'supportImg3' => $path3,
                'supportImg4' => $path4,
                'supportImg5' => $path5,

            ]);
            $sub = SubCategory::find($request->sub_category);
            $sub->product_count += 1;
            $sub->save();
            return redirect()->route('admin.product.list');
        }
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();

        return view('Admin.pages.product.editProduct', ['product' => $product, 'catges' => $categories]);
    }

    public function submit_edit(Request $request)
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
            return redirect()->route('admin.product.edit');
        } else {
            $id  = $request->id;
            $product = Product::findorfail($id);
            // delete all images
            Storage::disk('public')->delete($product->product_image->coverImage);
            Storage::disk('public')->delete($product->product_image->supportImg1);
            Storage::disk('public')->delete($product->product_image->supportImg2);
            Storage::disk('public')->delete($product->product_image->supportImg3);
            if ($product->product_image->supportImg4) {
                Storage::disk('public')->delete($product->product_image->supportImg4);
            }
            if ($product->product_image->supportImg5) {
                Storage::disk('public')->delete($product->product_image->supportImg5);
            }
            // delete success  


            $product->name = $request->title;
            $product->slug = Str::slug($request->title);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = null;
            $product->quantity = $request->quantity;
            $product->sub_category_id = $request->sub_category;
            $product->updated_at = now();
            $product->save();


            $cover = uniqid() . '_' . $request->file('cover')->getClientOriginalName();
            $fileName1 = uniqid() . '_' . $request->file('product_image1')->getClientOriginalName();
            $fileName2 = uniqid() . '_' . $request->file('product_image2')->getClientOriginalName();
            $fileName3 = uniqid() . '_' . $request->file('product_image3')->getClientOriginalName();

            $coverPath = $request->cover->storeAs('uploads/product', $cover, 'public');
            $path1 = $request->product_image1->storeAs('uploads/product', $fileName1, 'public');
            $path2 = $request->product_image2->storeAs('uploads/product', $fileName2, 'public');
            $path3 = $request->product_image3->storeAs('uploads/product', $fileName3, 'public');
            $path4 = null;
            $path5 = null;
            if ($request->hasFile('product_image4') && $request->file('product_image4')->isValid()) {
                $fileName4 = uniqid() . '_' . $request->file('product_image4')->getClientOriginalName();
                $path4 = $request->product_image4->storeAs('uploads/product', $fileName4, 'public');
            }
            if ($request->hasFile('product_image5') && $request->file('product_image5')->isValid()) {
                $fileName5 = uniqid() . '_' . $request->file('product_image5')->getClientOriginalName();
                $path5 = $request->product_image5->storeAs('uploads/product', $fileName5, 'public');
            }

            $product->product_image()->update([
                'coverImage' => $coverPath,
                'supportImg1' => $path1,
                'supportImg2' => $path2,
                'supportImg3' => $path3,
                'supportImg4' => $path4,
                'supportImg5' => $path5,

            ]);
            return redirect()->route('admin.product.list');
        }
    }


    // Delete
    public function delete(Request $request)
    {
        $id =   $request->id;

        $product = Product::find($id);

        if ($product) {
            Storage::disk('public')->delete($product->product_image->coverImage);
            Storage::disk('public')->delete($product->product_image->supportImg1);
            Storage::disk('public')->delete($product->product_image->supportImg2);
            Storage::disk('public')->delete($product->product_image->supportImg3);

            if ($product->product_image->supportImg4) {

                Storage::disk('public')->delete($product->product_image->supportImg4);
            }
            if ($product->product_image->supportImg5) {

                Storage::disk('public')->delete($product->product_image->supportImg5);
            }

            $product->product_image()->delete();
            $product->delete();
        }
        return redirect()->route('admin.product.list');
    }

    // view single Product
    public function singleProduct(Request $request)
    {
        $product  = Product::with('sub_category.category', 'product_image')->where('slug', $request->slug)->first();

        return view('singleProduct', ['product' => $product]);
    }
    // view single Product
    public function shop()
    {
        $product  = Product::with('sub_category.category', 'product_image')->simplePaginate(20);

        return view('shop', ['product' => $product]);
    }
}
