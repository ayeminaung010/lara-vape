<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Http\Requests\StoreBrandsRequest;
use App\Http\Requests\UpdateBrandsRequest;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brands::orderBy('created_at','desc')->paginate(20);
        return view('admin.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandsRequest $request)
    {
        $brand = new Brands();
        $brand->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/brands'),$imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        return redirect()->route('brands.index')->with('success','Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brands,$id)
    {
        $brand = Brands::find($id);
        return view('admin.pages.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandsRequest $request, Brands $brands,$id)
    {
        $brand = Brands::find($id);
        $brand->name = $request->name;
        if($request->hasFile('image')){
            $oldImg  = public_path('dbImg/brands/'.$brand->image);
            if(file_exists($oldImg)){
                unlink($oldImg);
            }
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/brands'),$imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        return redirect()->route('brands.index')->with('success','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands,$id)
    {
        $brand = Brands::find($id);
        $oldImg  = public_path('dbImg/brands/'.$brand->image);
        if(file_exists($oldImg)){
            unlink($oldImg);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success','Brand Deleted Successfully');

    }
}
