<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'admin', 'middleware' => [
//    'auth',
//    'role:admin',
// ]], function(){
//   Route::get('/', function(){
//     return 'halaman admin';

//   });

//   Route::get('profile', function(){
//        return 'halaman profile admin';
//   });
// });

// Route::group(['prefix' => 'pengguna', 'middleware' => [
//    'auth',
//    'role:pengguna',
// ]], function(){
//   Route::get('/', function(){
//     return 'halaman pengguna';

//   });

//   Route::get('profile', function(){
//       return 'halaman profile pengguna';
//    });
// });

Route::group(['prefix' => 'admin', 'middileware' => ['auth']], function () {
    Route::get('buku', function () {
        return view('buku.index');

    })->middleware(['role:admin|pengguna']);
});

Route::group(['prefix' => 'admin', 'middileware' => ['auth']], function () {
    Route::get('pengarang', function () {
        return view('pengarang.index');
    })->middleware(['role:admin']);;

    Route::resource('kategori', KategoriController::class)->middleware(['role:admin']);
    Route::resource('pembeli', PembeliController::class)->middleware(['role:admin']);
    Route::resource('barang', BarangController::class)->middleware(['role:admin']);
    Route::resource('transaksi', TransaksiController::class)->middleware(['role:admin']);
    Route::get('report', [ReportController::class, 'laporanTransaksi'])->name('getTransaksi');
    Route::post('report', [ReportController::class, 'reportTransaksi'])->name('reportTransaksi');

});
Route::get('/navbar', function () {
    return view('partials.navbar');
});

Route::get('/footer', function () {
    return view('partials.footer');
});

Route::get('/home1', function () {
    return view('front.home');
})->name('home1');

Route::get('/bola', function () {
    return view('front.sepakbola');
})->name('bola');

Route::get('/basket', function () {
    return view('front.basket');
})->name('basket');

Route::get('/tenis', function () {
    return view('front.tenis');
})->name('tenis');

Route::get('/badminton', function () {
    return view('front.badminton');
})->name('badminton');

Route::get('/renang', function () {
    return view('front.renang');
})->name('renang');

Route::get('/kontak', function () {
    return view('front.kontak');
})->name('kontak');

Route::get('/detail', function () {
    return view('front.detail');
})->name('detail');

Route::get('/checkout', function () {
    return view('front.checkout');
})->name('checkout');

Route::get('/blog', function () {
    return view('front.blog');
})->name('blog');

Route::get('/keranjang', function () {
    return view('front.keranjang');
})->name('keranjang');

// Route::get('/kontak', function () {
//     return view('front.kontak');
// })->name('kontak');
// Route::group(['prefix' => 'pembelian', 'middleware' => [
//     'auth',
//     'role:admin|kasir',
// ]], function(){
//    Route::get('/', function(){
//      return 'halaman pembelian';

//    });

//    Route::get('laporan', function(){
//        return 'halaman profile pembelian';
//    });
// });

//Route::resource('book', BookController::class)
//->middleware([
//    'auth',
//   'role:admin|kasir',
// ])
