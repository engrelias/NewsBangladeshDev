<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Category;
use App\Models\HomePageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomePageSectionController extends Controller
{
    // Display a listing of the resource.

    public function index(){

        $sections = HomePageSection::all();
        return view('admin.homePage.index', compact('sections'));
    }




    // show the form for creating a new resource

    public function create(){

        $lang = Language::select('id','lang_code','lang_title')->get();

        $categories = Category::select('id','category_name')->get();
        return view('admin.homePage.create', compact('lang', 'categories'));
    }


    // store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'section_name' => 'required',
            'section_title' => 'required',
            'section_categories' => 'required',
            'section_description' => 'nullable|string|max:2000',
            'ad_url' => 'nullable',
            'ad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ad_url2' => 'nullable',
            'ad_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'sometimes|boolean',         
        ]);



        $homePageSection = new HomePageSection();
        $homePageSection->section_name = $request->section_name;
        $homePageSection->section_title = $request->section_title;
        $homePageSection->section_order = $request->section_order;
        $homePageSection->section_description = $request->section_description;
        $homePageSection->is_active = $request->has('is_active') ? 1 : 0;
        $homePageSection->lang_code = $request->lang_code;
        $homePageSection->section_categories = $request->section_categories ?? 1;

        $homePageSection->display_by = Auth::id();
        $homePageSection->parent_section = Auth::id();

        $homePageSection->ad_url = $request->ad_url;
        $homePageSection->ad_code = $request->ad_code;
        $homePageSection->ad_type = $request->ad_type;

        $homePageSection->ad_url2 = $request->ad_url2;
        $homePageSection->ad_code2 = $request->ad_code2;
        $homePageSection->ad_type2 = $request->ad_type2;

        // Handle section_image upload



        // Handle ad_image upload
        if ($request->hasFile('section_image')) {
            $section_image = $request->file('section_image')->store('homePage', 'public');
        }

        if ($request->hasFile('ad_image')) {
            $ad_image = $request->file('ad_image')->store('homePage', 'public');
        }

        if ($request->hasFile('ad_image2')) {
            $ad_image2 = $request->file('ad_image2')->store('homePage', 'public');
        }
        
            
        $homePageSection->section_image = $section_image ?? null;
        $homePageSection->ad_image = $ad_image ?? null;
        $homePageSection->ad_image2 = $ad_image2 ?? null;
        $homePageSection->save();

        return redirect()->route('admin.homepage')->with('success', 'Home Page Section created successfully.');

    }


    // show the form for editing the specified resource
    public function edit($id)
    {
        $updateHomePage = HomePageSection::findOrFail($id);
        $lang = Language::select('id','lang_code','lang_title')->get();
        $categories = Category::select('id','category_name')->get();

        return view('admin.homePage.create', compact('updateHomePage', 'lang', 'categories'));
    }



    // update the specified resource in storage
    public function update(Request $request, $id)
    {

        $request->validate([
            'section_name' => 'required',
            'section_title' => 'required',
            'section_description' => 'nullable|string|max:2000',
            'ad_url' => 'nullable',
            'ad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ad_url2' => 'nullable',
            'ad_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'sometimes|boolean',         
        ]);

        $homePageSection = HomePageSection::findOrFail($id);
        $homePageSection->section_name = $request->section_name;
        $homePageSection->section_title = $request->section_title;
        $homePageSection->section_order = $request->section_order;
        $homePageSection->section_description = $request->section_description;
        $homePageSection->is_active = $request->has('is_active') ? 1 : 0;
        $homePageSection->lang_code = $request->lang_code;
        $homePageSection->section_categories = 1;
        $homePageSection->ad_url = $request->ad_url;
        $homePageSection->ad_code = $request->ad_code;
        $homePageSection->ad_type = $request->ad_type;
        $homePageSection->ad_url2 = $request->ad_url2;
        $homePageSection->ad_code2 = $request->ad_code2;
        $homePageSection->ad_type2 = $request->ad_type2;
        // Handle section_image upload

        if ($request->hasFile('section_image')) {
            if ($homePageSection->section_image) {
                Storage::disk('public')->delete($homePageSection->section_image);
            }
            $homePageSection->section_image = $request->file('section_image')->store('homePage', 'public');
        }

        if ($request->hasFile('ad_image')) {
            if ($homePageSection->ad_image) {
                Storage::disk('public')->delete($homePageSection->ad_image);
            }
            $homePageSection->ad_image = $request->file('ad_image')->store('homePage', 'public');
        }

        if ($request->hasFile('ad_image2')) {
            if ($homePageSection->ad_image2) {
                Storage::disk('public')->delete($homePageSection->ad_image2);
            }
            $homePageSection->ad_image2 = $request->file('ad_image2')->store('homePage', 'public');
        }

        $homePageSection->save();

        return redirect()->route('admin.homepage')->with('success', 'Home Page Section updated successfully.');

    }


    // remove the specified resource from storage

    public function destroy($id)
    {
        $homePageSection = HomePageSection::findOrFail($id);

        // Delete associated images
        if ($homePageSection->section_image) {
            Storage::disk('public')->delete($homePageSection->section_image);
        }
        if ($homePageSection->ad_image) {
            Storage::disk('public')->delete($homePageSection->ad_image);
        }
        if ($homePageSection->ad_image2) {
            Storage::disk('public')->delete($homePageSection->ad_image2);
        }

        $homePageSection->delete();

        return redirect()->route('admin.homepage')->with('success', 'Home Page Section deleted successfully.');
    }
        

}
