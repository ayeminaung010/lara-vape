<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use App\Http\Requests\StoreProductColorRequest;
use App\Http\Requests\UpdateProductColorRequest;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = ProductColor::orderBy('created_at','desc')
                ->where('name', 'like', '%' . request('search') . '%')
                ->paginate(10);
        return view('admin.pages.product-color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product-color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductColorRequest $request)
    {
        $productColor = new ProductColor();
        $productColor->name = $request->name;
        $productColor->save();
        return redirect()->route('productColor.index')->with('success','Product Color Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductColor $productColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductColor $productColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductColorRequest $request, ProductColor $productColor,$id)
    {
        $productColor = ProductColor::find($id);
        $productColor->name = $request->name;
        $productColor->save();
        return redirect()->route('productColor.index')->with('success','Product Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductColor $productColor,$id)
    {
        $productColor = ProductColor::find($id);
        $productColor->delete();
        return redirect()->route('productColor.index')->with('success','Product Color Deleted Successfully');
    }
}
