<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UserController;

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
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function ()
{
    Route::group(['middleware' => ['api.superadmin']], function ()
    {
        Route::delete('/produk/{id}', 'ProdukController@destroy');
        Route::delete('/pelanggan/{id}', 'PelangganController@destroy');
        Route::delete('/transaksi/{id}', 'TransaksiController@destroy');
        Route::delete('/dtransaksi/{id}', 'DetailTransaksiController@destroy');
    });

    Route::group(['middleware' => ['api.admin']], function ()
    {
        Route::post('/produk', 'ProdukController@store');
        Route::post('/pelanggan', 'PelangganController@store');
        Route::post('/transaksi', 'TransaksiController@store');
        Route::post('/dtransaksi', 'DetailTransaksiController@store');

        Route::put('/produk/{id}', 'ProdukController@update');
        Route::put('/pelanggan/{id}', 'PelangganController@update');
        Route::put('/transaksi/{id}', 'TransaksiController@update');
        Route::put('/dtransaksi/{id}', 'DetailTransaksiController@update');
    });

    Route::get('/produk', 'ProdukController@show');
    Route::get('/pelanggan', 'PelangganController@show');
    Route::get('/transaksi', 'TransaksiController@show');
    Route::get('/dtransaksi', 'DetailTransaksiController@show');

    Route::get('/produk/{id}', 'ProdukController@detail');
    Route::get('/pelanggan/{id}', 'PelangganController@detail');
    Route::get('/transaksi/{id}', 'TransaksiController@detail');
    Route::get('/dtransaksi/{id}', 'DetailTransaksiController@detail');

    // Route::resource('produk', 'ProdukController');
    // Route::resource('pelanggan', 'PelangganController');
    // Route::resource('transaksi', 'TransaksiController');
    // Route::resource('dtransaksi', 'DetailTransaksiController');
});

