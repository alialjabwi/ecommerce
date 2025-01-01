<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

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

        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        view()->composer('*', function ($view) {
            $totalItems = 0;
            $totalFavorites = 0;
    
            if (Auth::check()) {
                $totalItems = Cart::where('user_id', Auth::id())->sum('quantity');
                $totalFavorites = Favorite::where('user_id', Auth::id())->count();
            }
    
            $view->with('totalItems', $totalItems);
            $view->with('totalFavorites', $totalFavorites);
        });
    }
}
