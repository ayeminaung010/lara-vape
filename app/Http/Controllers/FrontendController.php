<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use App\Http\Requests\StoreFrontendRequest;
use App\Http\Requests\UpdateFrontendRequest;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frontend = Frontend::first();
        return view('admin.pages.frontend.index',compact('frontend'));
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
    public function store(StoreFrontendRequest $request)
    {
        $frontend = Frontend::first();
        if($request->hasFile('logo')){
            $oldImg  = public_path('dbImg/logo/'.$frontend->logo);
            if(file_exists($oldImg)){
                unlink($oldImg);
            }
        $image = $request->file('logo');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/logo'),$imageName);
            $frontend->logo = $imageName;
        }

        if($request->hasFile('banner_image')){
            $oldImg  = public_path('dbImg/banner/'.$frontend->banner_image);
            if(file_exists($oldImg)){
                unlink($oldImg);
            }
            $image = $request->file('banner_image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/banner'),$imageName);
            $frontend->banner_image = $imageName;
        }
        $frontend->facebook_url = $request->facebook_url;
        $frontend->instagram_url = $request->instagram_url;
        $frontend->save();
        return redirect()->route('frontend.index')->with('success','Data Updated Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrontendRequest $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
