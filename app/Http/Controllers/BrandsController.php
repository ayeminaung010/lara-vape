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
        $brands = Brands::where('created_at','desc')->paginate(5);
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
        //
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
    public function edit(Brands $brands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandsRequest $request, Brands $brands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands)
    {
        //
    }
}
