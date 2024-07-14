<?php

// routes/web.php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\BarangadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/home', [BarangController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');

Route::get('/kembali', function () {
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
Route::get('/update/{id}', [BarangadController::class, 'updatedata']);
Route::post('/upload/{id}', [BarangadController::class, 'update']);
Route::get('/delete/{id}', [BarangadController::class, 'destroy']);


Route::get('/laporan', [UserController::class, 'tabeltransaksi']);


Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');


Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::post('/transaksi/{id_transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('pelanggan');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/user', [AdminController::class, 'showUsers'])->name('admin.users');
Route::get('/hapus/{id_transaksi}', [TransaksiController::class, 'hapus'])->name('admin.users');

Route::post('/transaksi/selesai', [TransaksiController::class, 'rampung'])->name('transaksi.selesai');

Route::get('/search', [SearchController::class, 'search'])->name('search');