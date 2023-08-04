<?php

namespace App\Providers;

use App\Models\SEO;
use App\Models\Cart;
use App\Models\Brands;
use App\Models\Review;
use App\Models\Frontend;
use App\Models\Products;
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
            // $seo = SEO::first();
            $view->with('productTypes', $productsTypes);
            $view->with('brands', $brands);
            $view->with('reviews', $reviews);
            // $view->with('seo', $seo);
            if (Auth::check()) {
                $user = Auth::user();
                $cartData = Cart::where('user_id', $user->id)->get();
                $view->with('cartData', $cartData);
            }
        });

        view()->composer('templates.layouts.seo', function ($view) {
            $seo = SEO::first();
            $view->with('seo', $seo);
        });

        view()->composer('templates.layouts.app', function ($view) {
            $frontend = Frontend::first();
            $view->with('frontend', $frontend);
        });

        view()->composer('templates.sections.banner', function ($view) {
            $frontend = Frontend::first();
            $view->with('frontend', $frontend);
        });

        view()->composer('templates.sections.recommend-products', function ($view) {
            $recommend = Products::orderBy('created_at','desc')->paginate('10');
            $view->with('recommend', $recommend);
        });

    }
}
