<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

use App\Models\Brands;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Category;
use App\Models\Products;
use App\Models\OrderList;
use App\Models\SubCategory;
use App\Models\UserPayment;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            return redirect()->back()->with('error', 'Invalid Email or password. Please try again.!');
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
            $productsQuery->whereIn('sub_category_id', $subCategoryIds);
        }

        // Apply brand filtering
        $filterBrands = $request->input('filterBrand');
        if ($filterBrands) {
            $productsQuery->whereIn('brand_id', $filterBrands);
        }

        $products = $productsQuery->get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $brands = Brands::get();
        $productColors = ProductColor::get();
        return view('templates.pages.products', compact('products', 'categories', 'brands', 'subCategories','productColors'));
    }

    // slugProducts
    public function slugProducts($slug){
        $category = Category::where('slug',$slug)->first();
        $subCategories = SubCategory::where('category_id',$category->id)->get();
        $subCategoryIds = $subCategories->pluck('id')->toArray();
        $products = Products::whereIn('sub_category_id',$subCategoryIds)->get();

        $categories = Category::get();
        $subCategories = SubCategory::get();
        $productColors = ProductColor::get();
        $brands = Brands::get();
        return view('templates.pages.products',compact('products','categories','brands','subCategories','productColors'));
    }


    //productDetail
    public function productDetail($id)
    {
        $product = Products::find($id);
        $reviews = Rating::where('product_id', $id)
            ->leftJoin('users', 'users.id', '=', 'ratings.user_id')
            ->select('users.first_name as firstName', 'users.last_name','ratings.*')
            ->orderBy('created_at','desc')
            ->paginate(10);

        $reviewCount = $reviews->count();
        $total_star  = $reviews->count() * 5;
        $totalRating = 0;
        foreach($reviews as $review){
            $totalRating += $review->rating_status;
        }

        foreach ($reviews as $review) {
            $totalRating += $review->rating;
        }

        $averageRating = $reviewCount > 0 ? $totalRating / $reviewCount : 0;
        $product = Products::find($id);
        $product->rating = $averageRating;
        $product->save();

        return view('templates.pages.product-detail', compact('product', 'reviews','averageRating'));

    }



    //checkout
    public function checkout(){
        return view('templates.pages.checkout');
    }

    //payments
    public function payments(){
        return view('templates.pages.payments');
    }

    //submitOrder
    public function submitOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'payment_img' => 'image|mimes:jpeg,png,jpg,gif,svg,webp'
            ]);

            //payment save
            $payment = new UserPayment();
            $payment->user_id = Auth::user()->id;
            $payment->note = $request->note;
            $payment->note = $request->note;

            if ($request->hasFile('payment_img')) {
                $image = $request->file('payment_img');
                $imageName = uniqid().'.'.$image->getClientOriginalName();
                $image->move(public_path('dbImg/payments'), $imageName);
                $payment->image = $imageName;
            }
            $payment->save();

            $carts = Cart::select('carts.*','products.name as productName','products.original_price as originalPrice','products.discount_price as discountPrice','products.image as productImage',)
                    ->leftJoin('products','products.id','carts.product_id')
                    ->where('user_id',Auth::user()->id)
                    ->get(); //get all cart data

            //create order
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->order_code  = $request->order_code;
            $order->total_price = $request->total_price;
            $order->user_payment_id = $payment->id;
            $order->save();

            foreach($carts as $cart){
                $price = $cart->discount_price ? $cart->discountPrice : $cart->originalPrice * $cart->quantity;
                $orderList = new OrderList();
                $orderList->user_id = Auth::user()->id;
                $orderList->product_id = $cart->product_id;
                $orderList->product_color = $cart->color;
                $orderList->quantity = $cart->quantity;
                $orderList->total_price = $price;
                $orderList->order_code = $request->order_code;
                $orderList->save();
                $cart->delete();
            }

            // Commit the transaction
            DB::commit();

            // Additional logic after the transaction is successful

            return response()->json(['message' => 'Order submitted successfully']);

        } catch (\Exception $e) {
            DB::rollBack();

            // Handle the error or return an error response
            return back()->with('error', $e->getMessage());
            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //resetPassword
    public function resetPassword(){
        return view('templates.pages.reset-password');
    }


    //customerUpdatePassword
    public function customerUpdatePassword(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        $user = User::where('email',$validatedData['email'])->first();
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    //submitReview
    public function submitReview(Request $request){
        $rating = new Rating();
        $rating->title = $request->data['title'];
        $rating->message = $request->data['message'];
        $rating->rating_status  = $request->data['rating'];
        $rating->product_id = $request->data['product_id'];
        $rating->user_id = $request->data['user_id'];
        $rating->save();
        return response()->json(['message' => 'Review submitted successfully']);
    }

    //orderSuccess
    public function orderSuccess(){
        return view('templates.pages.order-success');
    }
}
