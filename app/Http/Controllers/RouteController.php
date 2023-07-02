<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
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


    //products
    public function products(Request $request)
    {
        $sort = $request->input('sort'); // Get the selected sorting option from the request

        $productsQuery = Products::query();

        // Apply sorting
        if ($sort) {
            if ($sort === 'name') {
                $productsQuery->orderBy('name');
            } elseif ($sort === 'price') {
                $productsQuery->orderBy('price');
            } elseif ($sort === 'created_at') {
                $productsQuery->orderBy('created_at');
            }
        }

        // Apply category filtering
        $filterCategories = $request->query('fliterCategory');
        if ($filterCategories) {
            $subCategories = SubCategory::whereIn('category_id', $filterCategories)->get();
            $subCategoryIds = $subCategories->pluck('id')->toArray();
            $productsQuery->whereIn('subCategory_id', $subCategoryIds);
        }


        // Apply brand filtering
        $filterBrands = $request->input('filterBrand');
        if ($filterBrands) {
            $productsQuery->whereIn('brand_id', $filterBrands);
        }

        $products = $productsQuery->get();
        $categories = Category::get();
        $brands = Brands::get();

        return view('templates.pages.products', compact('products', 'categories', 'brands'));
    }



    //productDetail
    public function productDetail($id){
        $product = Products::find($id);
        return view('templates.pages.product-detail',compact('product'));
    }
}
