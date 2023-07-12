<?php

namespace App\Http\Controllers;

use App\Models\UserPayment;
use App\Http\Requests\StoreUserPaymentRequest;
use App\Http\Requests\UpdateUserPaymentRequest;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userPayments = UserPayment::orderBy('created_at','desc')
                ->paginate(10);
        return view('admin.pages.payments.index',compact('userPayments'));
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
    public function store(StoreUserPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPayment $userPayment,$id )
    {
        $payment = UserPayment::orWhere('id',$id)->orWhere('order_code',$id)->firstOrFail();
        return view('admin.pages.payments.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPayment $userPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPaymentRequest $request, UserPayment $userPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPayment $userPayment,$id)
    {
        //
    }

    //approve
    public function approve(UserPayment $userPayment,$id)
    {
        $payment = UserPayment::find($id);
        $payment->status = 1;
        $payment->save();

        $order = Order::where('user_payment_id',$id)->first();
        $order->status = 1;
        $order->save();
        return redirect()->back()->with('success','Payment Approved');
    }

    //reject
    public function reject(UserPayment $userPayment,$id)
    {
        $payment = UserPayment::find($id);
        $payment->status = 2;
        $payment->save();

        $order = Order::where('user_payment_id',$id)->first();
        $order->status = 2;
        $order->save();
        return redirect()->back()->with('success','Payment Rejected');
    }

    //pending
    public function pending(UserPayment $userPayment)
    {
        $userPayments = UserPayment::where('status',0)->paginate('10');
        return view('admin.pages.payments.pending',compact('userPayments'));
    }

    //successful
    public function successful(UserPayment $userPayment)
    {
        $userPayments = UserPayment::where('status',1)->paginate('10');
        return view('admin.pages.payments.successful',compact('userPayments'));
    }

    //rejected
    public function rejected(UserPayment $userPayment)
    {
        $userPayments = UserPayment::where('status',2)->paginate('10');
        return view('admin.pages.payments.rejected',compact('userPayments'));
    }
}
