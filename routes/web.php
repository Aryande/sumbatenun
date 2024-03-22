<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Pengguna\PenggunaController;
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
#akes unutk halaman utama
Route::get('/', fn () => to_route('dashboard'));

/**
 * 
 * Route untuk admin
 */

Route::prefix('admin', 'admin')->group(function () {
    Route::get('dashboard', AdminController::class)->name('admin.dashboard');
    Route::resource('produk', ProdukController::class);
    Route::resource('order', OrderController::class);
});


/**
 * 
 * Route untuk Pengguna
 */

Route::get('home', [PenggunaController::class, 'index'])->name('dashboard');
Route::get('katalog', [PenggunaController::class, 'katalog'])->name('katalog');
Route::get('katalog/{produk}', [PenggunaController::class, 'katalog_detail'])->name('katalog.show');

#keranjang
Route::get('keranjang', [PenggunaController::class, 'keranjang'])->name('keranjang');
Route::get('tambah-keranjang/{produk}', [PenggunaController::class, 'tambah_item_keranjang'])->name('keranjang.tambah');
Route::get('keranjang/{id}', [PenggunaController::class, 'hapus_item_keranjang'])->name('keranjang.hapus');

Route::get('tentangkami', [PenggunaController::class, 'tentangkami'])->name('tentangkami');

#bikin orderan baru
Route::get('checkout', [PenggunaController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('checkout', [PenggunaController::class, 'simpan_data_pesanan'])->name('checkout.store')->middleware('auth');

#riwayat pemesanan
Route::get('riwayat', [PenggunaController::class, 'riwayat'])->name('riwayat')->middleware('auth');
Route::get('riwayat/{order}', [PenggunaController::class, 'riwayat_detail'])->name('riwayatshow')->middleware('auth');

#upload bukti bayar
Route::post('updateBukti/{order}', [PenggunaController::class, 'updateBukti'])->name('updateBukti')->middleware('auth');



/**
 * 
 * en
 * authentikasi
 * 
 */

#akses bagi yang belum melakukan login
Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginController::class, 'store']);
});

#akses bagi yang sudah melakukan login
Route::post('logout', [LoginController::class, 'destroy'])
    ->name('logout')->middleware('auth');
