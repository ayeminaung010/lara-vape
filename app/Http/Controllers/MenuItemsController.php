<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use App\Http\Requests\StoreMenuItemsRequest;
use App\Http\Requests\UpdateMenuItemsRequest;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreMenuItemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItems $menuItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItems $menuItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuItemsRequest $request, MenuItems $menuItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItems $menuItems)
    {
        //
    }
}
