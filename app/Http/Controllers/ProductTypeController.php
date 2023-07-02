<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $productTypes = ProductType::orderBy('created_at','desc')
                ->orWhere('name', 'like', '%' . request('search') . '%')
                ->paginate(10);
        return view('admin.pages.product-type.index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $productType = new ProductType();
        $productType->name = $request->name;
        $productType->slug = $request->slug;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/product-type'),$imageName);
            $productType->image = $imageName;
        }
        $productType->save();
        return redirect()->route('product_type.index')->with('success','Product type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType,$id)
    {
        $productType = ProductType::find($id);
        return view('admin.pages.product-type.edit',compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType,$id)
    {
        $productType = ProductType::find($id);
        $productType->name = $request->name;
        $productType->slug = $request->slug;
        if($request->hasFile('image')){
            $oldImg = $productType->image;
            if(file_exists(public_path('dbImg/product-type/'.$oldImg))){
                unlink(public_path('dbImg/product-type/'.$oldImg));
            }
            $image = $request->file('image');
            $imageName = uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/product-type'),$imageName);
            $productType->image = $imageName;
        }
        $productType->save();
        return redirect()->route('product_type.index')->with('success','Product type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType,$id)
    {
        $productType = ProductType::find($id);
        $oldImg = $productType->image;
        if(file_exists(public_path('dbImg/product-type/'.$oldImg))){
            unlink(public_path('dbImg/product-type/'.$oldImg));
        }
        $productType->delete();
        return redirect()->route('product_type.index')->with('success','Product type deleted successfully');
    }
}
