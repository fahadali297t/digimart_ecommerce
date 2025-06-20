<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{


    public function subCatList()
    {
        $subcategory = new SubCategory();
        $subcategories =  $subcategory->with('category')->simplePaginate(10);
        $count = $subcategory::count();
        return view('Admin.pages.subCategories', ['categs' => $subcategories, 'count' => $count]);
    }
    public function addSub()
    {

        $mainCategory = Category::all();

        return view('Admin.pages.newSubCategory', ['catgs' => $mainCategory]);
    }
    public function createSub(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name|unique:sub_categories,name',
        ]);

        if ($data) {
            $catgs = new SubCategory();


            // Save to database
            $catgs->name = $request->name;
            $catgs->category_id = $request->id;
            $catgs->save();
            return redirect()->route('admin.category.list');
        }
    }


    // 

    public function editform($id)
    {
        $singleSubCategory  = SubCategory::findorfail($id);
        return view('Admin.pages.EditSubCategory', ['singleCategory' => $singleSubCategory]);
    }
    // edit Category
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = $request->validate([
            'name' => ['required', Rule::unique('sub_categories')->ignore($id)],

        ]);

        // Check if file was uploaded

        $catgsModel = new SubCategory();


        $catgs = $catgsModel::find($id);
        $catgs->name = $request->name;
        $catgs->save();

        return redirect()->route('admin.category.list');
    }


    public function delete(Request $request)
    {
        $id =   $request->id;

        $category = SubCategory::find($id);

        if ($category) {
            $category->delete();
        }
        return redirect()->route('admin.category.list');
    }
}
