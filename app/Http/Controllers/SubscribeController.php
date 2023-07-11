<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = Subscribe::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.subscribers.index',compact('subscribers'));
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
        $subscribe = new Subscribe();
        $subscribe->first_name = $request->data['first_name'];
        $subscribe->last_name = $request->data['last_name'];
        $subscribe->phone = $request->data['phone'];
        $subscribe->email = $request->data['email'];
        $subscribe->save();
        return response()->json(['status' => 'success' ,'message' => 'Subscribe successfully , Thank you!'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscribeRequest $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscribe,$id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->delete();
        return redirect()->route('subscriber.index')->with('success','Subscriber deleted successfully');
    }
}
