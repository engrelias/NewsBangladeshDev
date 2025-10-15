<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    

    // Display a listing of the resource.
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }



    // Show the form for creating a new resource.

    public function create()
    {
        $lang = Language::select('id','lang_title','lang_code')->get();
        $categories = Category::select('id','category_name')->where('category_status',1)->where('category_parent', 0)->get();
        return view('admin.categories.create', compact('lang', 'categories'));
    }



    // Store a newly created resource in storage.


    public function store(Request $request)
    {


        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_menu' => 'sometimes|boolean',
            'is_mobile_menu' => 'sometimes|boolean',
            'lang_code' => 'required',
            'category_status' => 'required',
            'category_icon' => 'nullable|string|max:255',
            'category_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);


        // Handle file upload if exists
        $imagePath = null;
        if ($request->hasFile('category_img')) {
            $imagePath = $request->file('category_img')->store('categories', 'public');
        }

        $parent_lang = Category::where('id', $request->category_parent)->value('lang_code');

        // Create new category
      Category::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'category_img' => $imagePath,
            'category_icon' => $request->category_icon,
            'category_order' => $request->category_order,
            'category_status' => $request->category_status,
            'lang_code' => $request->lang_code,
            'category_parent' => $request->category_parent ?? 0,
            'parent_lang' => $parent_lang ?? 'bn',
            'is_menu' => $request->is_menu ?: 0,
            'is_mobile_menu' => $request->is_mobile_menu ?: 0,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'user_id' => Auth::user()->id,
        ]);


        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    // Display the specified resource.

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }


    // Show the form for editing the specified resource.

    public function edit($id)
    {
        $updateCategory = Category::findOrFail($id);
        $categories = Category::select('id','category_name')->where('category_status',1)->where('category_parent', 0)->get();
        $lang = Language::select('id','lang_title','lang_code')->get();

        return view('admin.categories.create', compact('updateCategory', 'categories', 'lang'));
    }



    // Update the specified resource in storage.

    public function update(Request $request, $id)
    {

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_menu' => 'sometimes|boolean',
            'is_mobile_menu' => 'sometimes|boolean',
            'lang_code' => 'required',
            'category_status' => 'required',
            'category_icon' => 'nullable|string|max:255',
            'category_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $category = Category::findOrFail($id);


        // Handle file upload if exists
        if ($request->hasFile('category_img')) {

            // Delete old image if exists
            if ($category->category_img) {
                Storage::disk('public')->delete($category->category_img);
            }
            $imagePath = $request->file('category_img')->store('categories', 'public');
            $category->category_img = $imagePath;
        }

        $parent_lang = Category::where('id', $request->category_parent)->value('lang_code');


        // Update category details
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'category_icon' => $request->category_icon,
            'category_order' => $request->category_order,
            'category_status' => $request->category_status,
            'lang_code' => $request->lang_code,
            'category_parent' => $request->category_parent ?? 0,
            'parent_lang' => $parent_lang ?? 'bn',
            'is_menu' => $request->is_menu ?: 0,
            'is_mobile_menu' => $request->is_mobile_menu ?: 0,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    // Remove the specified resource from storage.

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete category image if exists
        if ($category->category_img) {
            Storage::disk('public')->delete($category->category_img);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
