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
            ->orderBy('created_at','desc')->paginate(10);
        return view('admin.pages.users.index',compact('users'));
    }

    //destroy
    public function destroy($id){
        $user = User::find($id);

        if($user){
            $oldImg  = public_path('dbImg/user/'.$user->image);
            if(file_exists($oldImg)){
                unlink($oldImg);
            }
            $user->delete();
            return redirect()->back()->with('success','User deleted successfully');
        }
        return redirect()->back()->with('error','something wrong');
    }
}
