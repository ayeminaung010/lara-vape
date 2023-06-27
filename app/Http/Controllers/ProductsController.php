<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::orderBy('created_at','desc')->paginate(10);
        return view('admin.pages.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.pages.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/products'),$imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('products.index')->with('success','Product Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products,$id)
    {
        $product = Products::find($id);
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.pages.products.edit',compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products,$id)
    {
        $product = Products::find($id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        if($request->hasFile('image')){
            $oldImg = public_path('dbImg/products/'.$product->image);
            if(file_exists($oldImg)){
                unlink($oldImg);
            }
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/products'),$imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('products.index')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products,$id)
    {
        $product = Products::find($id);
        $oldImg = public_path('dbImg/products/'.$product->image);
        if(file_exists($oldImg)){
            unlink($oldImg);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Product Deleted Successfully');
    }
}
