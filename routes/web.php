<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

use App\Http\Livewire\Cart;

Route::get('/', function () {
    return view('pharmacy');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::resource('/users', UserController::class);
Route::resource('/products', ProductController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
Route::resource('/favorites', FavoriteController::class);


Route::resource('/checkout', CheckoutController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('profile.show');
    })->name('dashboard');
});
