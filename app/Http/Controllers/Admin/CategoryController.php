<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $category = new Category();
        $categs = $category::simplePaginate(10);
        $count = $category::count();

        if ($request->ajax()) {

            return view('Admin.pages.categories', ['categs' => $categs, 'count' => $count])->render();
        } else {
            return view('Admin.pages.categories', ['categs' => $categs, 'count' => $count]);
        }
    }

    public function add()
    {
        return view('Admin.pages.newCategory');
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name',
            'cover' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Check if file was uploaded
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $catgs = new Category();

            $fileName = uniqid() . '.' . $request->cover->extension();
            $file   = file($request->cover);

            // Store the file in storage/app/public/uploads
            $path = $request->cover->storeAs('uploads', $fileName, 'public');

            // Debug - Make sure it's being stored
            if (!$path) {
                return back()->with('error', 'File upload failed.');
            }

            // Save to database
            $catgs->name = $request->name;
            $catgs->img = $fileName;
            $catgs->save();

            return redirect()->route('admin.category.list')->with('success', 'Category created.');
        }

        return back()->with('error', 'Invalid file.');
    }
    public function editform($id)
    {
        $singleCategory  = Category::findorfail($id);
        return view('Admin.pages.EditCategory', ['singleCategory' => $singleCategory]);
    }
    // edit Category
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($id)],
            'cover' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        // Check if file was uploaded
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $catgsModel = new Category();

            $fileName = uniqid() . '.' . $request->cover->extension();
            $file   = file($request->cover);

            // Store the file in storage/app/public/uploads
            $path = $request->cover->storeAs('uploads', $fileName, 'public');

            // Debug - Make sure it's being stored
            if (!$path) {
                return back()->with('error', 'File upload failed.');
            }
            // Save to database
            $catgs = $catgsModel::find($id);
            $catgs->name = $request->name;
            $catgs->img = $fileName;
            $catgs->save();

            return redirect()->route('admin.category.list')->with('success', 'Category created.');
        }

        return back()->with('error', 'Invalid file.');
    }


    public function delete(Request $request)
    {
        $id =   $request->id;

        $category = Category::find($id);

        if ($category) {
            Storage::disk('public')->delete('uploads/' . $category->img);
            $category->delete();
        }
        return redirect()->route('admin.category.list');
    }

    public function view($id)
    {
        $category = Category::with('sub_category')->find($id);
        return view('Admin.pages.singleCategory', ['categs' => $category]);
        // return $category;
    }
}
