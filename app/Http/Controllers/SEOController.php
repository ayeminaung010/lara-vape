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
        $seo = SEO::first();
        if($request->hasFile('seo_image')){
            $oldImg  = public_path('dbImg/seo/'.$seo->logo);
            if(file_exists($oldImg) && $seo->logo != null){
                unlink($oldImg);
            }
            $image = $request->file('seo_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/seo'),$imageName);
            $seo->seo_image = $imageName;
        }

        if($request->hasFile('favicon')){
        $oldImg  = public_path('dbImg/seo/'.$seo->favicon);
            if(file_exists($oldImg) && $seo->favicon != null){
                unlink($oldImg);
            }
            $image = $request->file('favicon');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/seo'),$imageName);
            $seo->favicon = $imageName;
        }

        $seo->title = $request->title;
        $seo->keywords = $request->keywords;
        $seo->author = $request->author;
        $seo->description = $request->description;

        $seo->social_title = $request->social_title;
        $seo->social_description = $request->social_description;

        $seo->save();
        return redirect()->back()->with('success','SEO Updated Successfully');
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
