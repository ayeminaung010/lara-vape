<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'mimes:jpeg,jpg,png,webp',
        ]);
        $admin = User::find($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->ph_no = $request->phone;
        $admin->gender =   $request->gender;
        $admin->address = $request->address;
        if ($request->hasFile('image')) {
            $oldImg  = public_path('dbImg/profile/'.$admin->image);
            if(file_exists($oldImg) && $admin->image != null){
                unlink($oldImg);
            }
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalName();
            $image->move(public_path('dbImg/profile'),$imageName);
            $admin->image = $imageName;
        }
        $admin->save();
        Session::flash('success','Profile updated successfully');
        return redirect()->back()->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    //profile
    public function profile()
    {
        $admin = User::find(Auth::user()->id);
        return view('admin.pages.profile.index',compact('admin'));
    }

    //password
    public function password()
    {
        return view('admin.pages.password-change.index');
    }

    //updatePassword
    public function updatePassword(Request $request)
    {
        $admin = User::find(Auth::user()->id);
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            Session::flash('success','Password updated successfully');
            Auth::logout();
            return redirect()->route('admin.login')->with('success','Password updated successfully');
        }else{
            Session::flash('error','Old password does not match');
            return redirect()->back()->with('error','Old password does not match');
        }
    }
}
