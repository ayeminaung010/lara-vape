<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Brands;
use App\Models\Review;
use App\Models\ProductType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        view()->composer('templates.pages.home', function ($view) {
            $productsTypes = ProductType::get();
            $brands = Brands::get();
            $reviews = Review::get();
            $view->with('productTypes', $productsTypes);
            $view->with('brands', $brands);
            $view->with('reviews', $reviews);
            if (Auth::check()) {
                $user = Auth::user();
                $cartData = Cart::where('user_id', $user->id)->get();
                $view->with('cartData', $cartData);
            }
        });


    }
}
