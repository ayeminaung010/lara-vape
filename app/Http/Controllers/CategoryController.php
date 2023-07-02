<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')
                    ->where('name', 'like', '%' . request('search') . '%')
                    ->paginate(10);
        return view('admin.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category,$id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
