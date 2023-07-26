<?php

use App\Http\Livewire\Pages\Cart;
use App\Http\Livewire\Pages\Checkout;
use App\Http\Livewire\Pages\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\ProductDetail;
use App\Http\Livewire\Pages\ProductLeague;

Route::get('/', Home::class)->name('home');

Route::get('products', Product::class)->name('products');
Route::get('product/{slug}', ProductLeague::class)->name('product.league');
Route::get('product-detail/{slug}', ProductDetail::class)->name('product.detail');
Route::get('cart', Cart::class)->name('cart');
Route::get('checkout', Checkout::class)->name('checkout');

Auth::routes();
