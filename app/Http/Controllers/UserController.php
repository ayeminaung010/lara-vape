<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index(){
        $users = User::where('role','user')
                ->where('status','active')
                ->orderBy('created_at','desc')->paginate(5);
        return view('admin.pages.users.index',compact('users'));
    }
}
