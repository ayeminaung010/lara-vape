<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use App\Http\Requests\StoreSEORequest;
use App\Http\Requests\UpdateSEORequest;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seo  = SEO::first();
        return view('admin.pages.seo.index',compact('seo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSEORequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SEO $sEO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SEO $sEO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSEORequest $request, SEO $sEO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SEO $sEO)
    {
        //
    }
}
