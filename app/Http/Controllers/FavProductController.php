<?php

namespace App\Http\Controllers;

use App\Models\FavProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFavProductRequest;
use App\Http\Requests\UpdateFavProductRequest;

class FavProductController extends Controller
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
    public function store(Request $request)
    {
        $favProduct = FavProduct::where('user_id', $request->data['user_id'])
            ->where('product_id', $request->data['product_id'])
            ->first();

        if ($favProduct) {
            // Product already exists in favorites
            return response()->json(['status' => 'false', 'message' => 'Already added to favorites'], 200);
        } else {
            // Create a new favorite product
            $newFavProduct = new FavProduct();
            $newFavProduct->user_id = $request->data['user_id'];
            $newFavProduct->product_id = $request->data['product_id'];
            $newFavProduct->save();

            return response()->json($newFavProduct, 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(FavProduct $favProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavProduct $favProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavProductRequest $request, FavProduct $favProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $favProduct = FavProduct::where('user_id', $request->data['user_id'])
            ->where('product_id', $request->data['product_id'])
            ->first();

        $favProduct->delete();
        return response()->json(['status' => 'true', 'message' => 'Removed from favorites'], 200);
    }

    //getFav
    public function getFav(){
        $favProducts = FavProduct::where('user_id',auth()->user()->id)
            ->leftJoin('products', 'products.id', '=', 'fav_products.product_id')
            ->paginate('10');
        return view('templates.user.pages.fav',compact('favProducts'));
    }
}
