<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use App\Models\DeliveryDetail;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at','desc')
            // ->select('orders.*','users.first_name as firstName','users.last_name as lastName')
            // ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->where('order_code', 'like', '%' . request('search') . '%')
            ->orWhere('total_price', 'like', '%' . request('search') . '%')
            ->paginate(10);
        return view('admin.pages.orders.index',compact('orders'));
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order,$code)
    {
        $orderLists = OrderList::where('order_code',$code)
            ->leftJoin('products', 'products.id', '=', 'order_lists.product_id')
            ->get();
        $order = Order::where('order_code',$code)->first();
        $deliveryDetail = DeliveryDetail::where('order_id',$order->id)->first();
        return view('admin.pages.orders.show',compact('orderLists','deliveryDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
