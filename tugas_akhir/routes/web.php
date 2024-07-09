<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;


Route::get('/', [BarangController::class, 'index']);

Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');


Route::get('/login', function () {
    return view('welcome');
});



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
