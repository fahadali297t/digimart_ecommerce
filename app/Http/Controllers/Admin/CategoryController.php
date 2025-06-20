<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function list()
    {
        $category = new Category();
        $categs = $category::simplePaginate(10);
        $count = $category::count();
        return view('Admin.pages.categories', ['categs' => $categs, 'count' => $count]);
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

            // Store the file in storage/app/public/uploads
            $path = $request->cover->storeAs('public/uploads', $fileName);
            dd([
                'stored_to' => $path,
                'exists' => Storage::disk('public')->exists('uploads/' . $fileName),
                'full_path' => storage_path('app/public/uploads/' . $fileName),
            ]);
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
}
