<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    //profile
    public function profile(){
        return view('templates.user.pages.profile');
    }

    //updateProfile
    public function updateProfile(Request $request,$id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->ph_no = $request->phone;
        $user->gender =   $request->gender;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }

    //passwordChange
    public function passwordChange(){
        return view('templates.user.password-change');
    }

    //updatePassword
    public function updatePassword(Request $request){
        $user = User::find(Auth::user()->id);
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.login')->with('success','Password updated successfully');
        }else{
            return redirect()->back()->with('error','Old password does not match');
        }

    }

    //orderLists
    public function orderLists(){
        $orders = Order::where('user_id',Auth::user()->id)->where('status', '0')->paginate(10);
        return view('templates.user.pages.orders',compact('orders'));
    }

    //history
    public function history(){
        $orders = Order::where('user_id',Auth::user()->id)->where('status', '1')->where('status', '2')->paginate(10);
        return view('templates.user.pages.history',compact('orders'));
    }
}
