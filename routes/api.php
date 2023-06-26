<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [ProdukController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'produkRead']);
Route::get('/produk/search', [ProdukController::class, 'search']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/search', [ReviewController::class, 'search']);
Route::get('/reviews/orderBy', [ReviewController::class, 'sortBy']);




Route::post('/reviews', [ReviewController::class, 'store']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::post('/keranjang', [KeranjangController::class, 'store']);

Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::put('/reviews/{id}', [ReviewController::class, 'update']);

Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);





