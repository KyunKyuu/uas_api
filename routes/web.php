<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [ProdukController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'produkRead']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::get('/produk/search', [ProdukController::class, 'search']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::get('/keranjang/halaman', [KeranjangController::class, 'halaman']);
Route::get('/success', [StripeController::class, 'success']);
Route::get('/reviews/halaman', [ReviewController::class, 'halaman']);
Route::get('/reviews', [ReviewController::class, 'index']);

Route::post('/produk', [ProdukController::class, 'store']);
Route::post('/keranjang', [KeranjangController::class, 'store']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::post('/checkout/{id}', [StripeController::class, 'checkout']);

Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::put('/reviews/{id}', [ReviewController::class, 'update']);

Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);










