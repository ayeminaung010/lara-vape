<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
