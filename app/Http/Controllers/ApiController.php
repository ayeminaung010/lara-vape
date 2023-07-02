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

    //getCarts
    public function getCarts(Request $request){
        $carts = Cart::select('products.*','products.name as product_name','products.image as product_image','products.description as product_description','products.color as product_color','carts.*')
                ->where('user_id',$request->data['user_id'])
                ->leftJoin('products','carts.product_id','products.id')
                ->get();
        return response()->json($carts, 200);
    }

    //clearCarts
    public function clearCarts(Request $request){
        $carts = Cart::where('user_id',$request->data['user_id'])->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Cart Cleared Successfully'
        ]);
    }

    //removeQuantity
    public function removeQuantity(Request $request){
        $result = Cart::where('user_id',$request->data['user_id'])->where('product_id',$request->data['product_id'])->first();
        if($result){
            $result->quantity = $request->data['quantity'];
            $result->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Quantity Updated Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Product Quantity Updated Successfully'
            ]);
        }
    }

    //addQuantity
    public function addQuantity(Request $request){
    logger($request);
        $result = Cart::where('user_id',$request->data['user_id'])->where('product_id',$request->data['product_id'])->first();
        if($result){
            $result->quantity = $request->data['quantity'];
            $result->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Quantity Updated Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Product Quantity Updated Successfully'
            ]);
        }
    }

    //removeItem
    public function removeItem(Request $request){
        $result = Cart::where('user_id',$request->data['user_id'])->where('product_id',$request->data['product_id'])->first();
        if($result){
            $result->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product Removed Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Product Removed Successfully'
            ]);
        }
    }
}
