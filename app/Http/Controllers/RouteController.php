<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RouteController extends Controller
{
    //home
    public function Home(){
        return view('templates.pages.home');
    }

    //signIn
    public function SignIn(){
        return view('templates.pages.sign-in');
    }

    //signUp
    public function SignUp(){
        return view('templates.pages.sign-up');
    }

    //dashboard
    public function dashboard(){
        return view('admin.dashboard.index');
    }

    //loginAdmin
    public function loginAdmin(){
        return view('admin.login');
    }

    //customerAuth
    public function customerAuth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    //customerRegister
    public function customerRegister(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->gender =  $validatedData['gender'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('customer.login')->with('success', 'Registration successful!');
    }


}
