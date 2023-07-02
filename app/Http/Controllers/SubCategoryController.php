<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('created_at','desc')
                    ->where('name', 'like', '%' . request('search') . '%')
                    ->paginate(10);
        $categories = Category::get();
        return view('admin.sub-category.index',compact('subCategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
        return redirect()->route('subCategory.index')->with(['success' => 'SubCategory Created Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubCategoryRequest $request, SubCategory $subCategory,$id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
        return redirect()->route('subCategory.index')->with(['success' => 'SubCategory Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory,$id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('subCategory.index')->with(['success' => 'SubCategory Deleted Successfully']);
    }
}
