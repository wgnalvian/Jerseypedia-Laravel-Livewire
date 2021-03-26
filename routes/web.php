<?php

use App\Http\Livewire\Checkout;
use App\Http\Livewire\History;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Keranjang;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', \App\Http\Livewire\Home::class)->middleware('auth');
Route::get('/products', \App\Http\Livewire\ProductIndex::class)->name('products')->middleware('auth');
Route::get('/products/{id}', \App\Http\Livewire\ProductDetail::class)->name('products-detail')->middleware('auth');
Route::get('/products/liga/{id}', \App\Http\Livewire\ProductLiga::class)->name('products-liga')->middleware('auth');
Route::get('/keranjang', Keranjang::class)->name('keranjang')->middleware('auth');
Route::get('/checkout', Checkout::class)->name('checkout')->middleware('auth');
Route::get('/history', History::class)->name('history')->middleware('auth');


