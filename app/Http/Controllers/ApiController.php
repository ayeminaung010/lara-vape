<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //addToCart
    public function addToCart(Request $request){
        $result = Cart::where('user_id',$request->data['user_id'])->where('product_id',$request->data['product_id'])->where('color',$request->data['color'])->first();
        if($result){
            $result->quantity = $result->quantity + $request->data['quantity'];
            $result->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Added to Cart Successfully'
            ]);
        }else{
            $cart  = new Cart();
            $cart->user_id = $request->data['user_id'];
            $cart->product_id = $request->data['product_id'];
            $cart->quantity = $request->data['quantity'];
            $cart->color = $request->data['color'];
            $cart->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Added to Cart Successfully'
            ]);
        }

    }
}
