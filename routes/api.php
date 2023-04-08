<?php

use App\Http\Controllers\API\AuthAPI;
use App\Http\Controllers\API\BarangAPI;
use App\Http\Controllers\API\KategoriAPI;
use App\Http\Controllers\API\StockAPI;
use App\Http\Controllers\API\UserAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('login', [AuthAPI::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('user', [UserAPI::class, 'index']);
    Route::post('user', [UserAPI::class, 'create']);
    Route::post('user/{id}', [UserAPI::class, 'update']);
    Route::get('user/{id}', [UserAPI::class, 'show']);
    Route::delete('user/{id}', [UserAPI::class, 'destroy']);


    // Barang
    Route::get('barang', [BarangAPI::class, 'index']);
    Route::get('barang/{id}', [BarangAPI::class, 'show']);
    Route::post('barang', [BarangAPI::class, 'simpan']);
    Route::post('barang/{id}', [BarangAPI::class, 'update']);
    Route::delete('barang/{id}', [BarangAPI::class, 'destroy']);

    // Harga Barang
    Route::get('kategori', [KategoriAPI::class, 'index']);
    Route::get('kategori/{id}', [KategoriAPI::class, 'show']);
    Route::post('kategori', [KategoriAPI::class, 'simpan']);
    Route::post('kategori/{id}', [KategoriAPI::class, 'update']);
    Route::delete('kategori/{id}', [KategoriAPI::class, 'destroy']);

    // Harga Stock
    Route::get('stock', [StockAPI::class, 'index']);
    Route::get('stock/{id}', [StockAPI::class, 'show']);
    Route::post('stock', [StockAPI::class, 'simpan']);
    Route::post('stock/{id}', [StockAPI::class, 'update']);
    Route::delete('stock/{id}', [StockAPI::class, 'destroy']);

    // User Auth
    Route::post('register', [UserAPI::class, 'register']);
    Route::post('logout', [AuthAPI::class, 'logout']);
});
