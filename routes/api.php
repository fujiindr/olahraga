<?php

use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PembeliController;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::resource('User', ApiUserController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('pembeli', PembeliController::class);
Route::resource('barang', BarangController::class);
Route::resource('transaksi', TransaksiController::class);
