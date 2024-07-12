<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\BarangadController;

Route::get('/', [BarangController::class, 'index']);

Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/add/{id}', [KeranjangController::class, 'addToCart'])->name('keranjang.add');
Route::post('/keranjang/purchase', [KeranjangController::class, 'purchase'])->name('keranjang.purchase');
Route::post('/transaksi/selesai', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');
Route::post('/keranjang/remove/{id}', [KeranjangController::class, 'removeFromCart'])->name('keranjang.remove');
Route::post('/keranjang/remove-multiple', [KeranjangController::class, 'removeMultiple'])->name('keranjang.remove-multiple');

Route::get('/admin', [BarangadController::class, 'index'])->name('admin.barang');
Route::post('/barang/store', [BarangadController::class, 'store'])->name('barang.store');


Route::get('/user', function () {
    return view('admin.pelanggan');
});

Route::get('/laporan', function () {
    return view('admin.laporan');
});