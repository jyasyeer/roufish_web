<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('home', function () {
    if (auth()->user()->role == 'admin') {
        return redirect()->intended('admin/dashboard');
    }
    if (auth()->user()->role == 'penjual') {
        return redirect()->intended('penjual/dashboard');
    }
    if (!auth() || auth()->user()->role == 'pembeli') {
        return redirect()->intended('/');
    }
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk', [App\Http\Controllers\ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('produk.show');
Route::get('/produk/{slug}/detail-pengiriman', [App\Http\Controllers\ProductController::class, 'pengiriman'])->name('produk.pengiriman');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::view('/faq', 'pages.faq')->name('faq');

Route::get('/lelang', [App\Http\Controllers\AuctionController::class, 'index'])->name('lelang.index');
Route::get('/lelang/{slug}', [App\Http\Controllers\AuctionController::class, 'show'])->name('lelang.show');
Route::get('/lelang/{slug}/riwayat-penawaran', [App\Http\Controllers\AuctionController::class, 'riwayat'])->name('lelang.riwayat');
Route::post('/lelang/{id}', [App\Http\Controllers\AuctionController::class, 'ajukanPenawaran'])->name('lelang.ajukanPenawaran');

Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat-order', [App\Http\Controllers\OrderController::class, 'index'])->name('riwayat-order.index');
    Route::post('order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

    Route::get('/riwayat-lelang', [App\Http\Controllers\lelangController::class, 'index'])->name('riwayat-lelang.index');
    Route::get('/riwayat-lelang/{id}', [App\Http\Controllers\lelangController::class, 'show'])->name('riwayat-lelang.show');
    Route::post('/riwayat-lelang/pengiriman/{id}', [App\Http\Controllers\lelangController::class, 'pengiriman'])->name('riwayat-lelang.pengiriman');


    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
});


Route::middleware(['isAdmin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('penjual', App\Http\Controllers\Admin\PenjualController::class);
    Route::resource('pembeli', App\Http\Controllers\Admin\PembeliController::class);
    Route::resource('produk-jual', App\Http\Controllers\Admin\ProductJualController::class);
    Route::resource('produk-lelang', App\Http\Controllers\Admin\ProductLelangController::class);
});

Route::middleware(['isPenjual'])->name('penjual.')->prefix('penjual')->group(function () {
    Route::get('/', function () {
        return redirect()->route('penjual.dashboard');
    });
    Route::get('dashboard', App\Http\Controllers\Penjual\DashboardController::class)->name('dashboard');
    Route::resource('jual-produk', App\Http\Controllers\Penjual\SellProductController::class);
    Route::resource('lelang-produk', App\Http\Controllers\Penjual\ProductAuctionController::class);
    Route::post('lelang/{product:id}', [App\Http\Controllers\Penjual\AuctionController::class, 'store'])->name('lelang.store');
    Route::resource('lelang', App\Http\Controllers\Penjual\AuctionController::class)->except(['create', 'store']);
    Route::resource('order', App\Http\Controllers\Penjual\OrderController::class)->except(['create', 'store']);
});
