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
use App\Models\FavProduct;
use App\Models\SubCategory;
use App\Models\UserPayment;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\DeliveryDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RouteController extends Controller
{
    //home
    public function Home(){
        return view('templates.pages.home');
    }

    //contact
    public function contact(){
        return view('templates.pages.contact-us');
    }

    //about
    public function about(){
        return view('templates.pages.about');
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
        $categories = Category::all();
        $products = Products::all();
        $brands = Brands::all();
        $subCategories = SubCategory::all();
        $reviews = Review::all();
        $ratings = Rating::all();
        
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


    // Helper method for applying filters
    private function applyFilters($query, $request)
    {
        $filterCategories = $request->input('category');
        if ($filterCategories) {
            $query->whereIn('sub_category_id', $filterCategories);
        }

        $filterBrands = $request->input('brand');
        if ($filterBrands) {
            $query->whereIn('brand_id', $filterBrands);
        }

        $filterColors = $request->input('color');
        if ($filterColors) {
            $query->where(function ($query) use ($filterColors) {
                foreach ($filterColors as $color) {
                    $query->orWhereJsonContains('color', $color);
                }
            });
        }
    }

    // products
    public function products(Request $request)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $productColors = ProductColor::all();
        $subCategories = SubCategory::all();

        $sort = $request->input('sort'); // Get the selected sorting option from the request

        $productsQuery = Products::query();

        $this->applyFilters($productsQuery, $request);

        $products = $productsQuery->paginate(9);

        return view('templates.pages.products', compact('products', 'categories', 'brands', 'productColors', 'subCategories'));
    }

    // slugProducts
    public function slugProducts($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();
        $subCategories = SubCategory::where('category_id', $category->id)->get();
        $subCategoryIds = $subCategories->pluck('id')->toArray();

        $sort = $request->input('sort'); // Get the selected sorting option from the request

        $productsQuery = Products::whereIn('sub_category_id', $subCategoryIds);

        $this->applyFilters($productsQuery, $request);

        $products = $productsQuery->paginate(9);

        $categories = Category::get();
        $brands = Brands::get();
        $productColors = ProductColor::get();
        return view('templates.pages.products', compact('products', 'categories', 'brands', 'subCategories', 'productColors'));
    }

    //search
    public function search(Request $request){
        $query = $request->input('search'); // Get the search query from the request

        $products = Products::where('name', 'LIKE', '%' . $query . '%')
                            ->orWhere('description', 'LIKE', '%' . $query . '%')
                            ->paginate(9);
        return view('templates.pages.search',compact('products'));
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

        $topRateProducts = Products::where('rating','>=',4)->take(10)->get();
        $similarProducts = Products::where('sub_category_id',$product->sub_category_id)->take(10)->get();

        if(Auth::check()){
            if(Auth::user()->role == 'user'){
                $favProduct  = FavProduct::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
                return view('templates.pages.product-detail', compact('product', 'reviews','averageRating','topRateProducts','similarProducts','favProduct'));
            }
        }
        return view('templates.pages.product-detail', compact('product', 'reviews','averageRating','topRateProducts','similarProducts'));

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
            $payment->order_code = $request->order_code;
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

            //delivery detail
            $deliveryDetail =  new DeliveryDetail();
            $deliveryDetail->name = $request->deliveryName;
            $deliveryDetail->email = $request->deliveryEmail;
            $deliveryDetail->phone = $request->deliveryPhone;
            $deliveryDetail->address =  $request->deliveryAddress;
            $deliveryDetail->message = $request->deliveryNote;
            $deliveryDetail->order_id = $order->id;
            $deliveryDetail->save();

            foreach($carts as $cart){
                $products = Products::find($cart->product_id);
                $products->stock = $products->stock - $cart->quantity;
                $products->save();

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
            return redirect()->route('user.orderSuccess')->with('success','Order placed successfully');
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
