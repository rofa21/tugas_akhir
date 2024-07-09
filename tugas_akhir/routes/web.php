<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;



Route::get('/', [BarangController::class, 'index']);

Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');


Route::get('/login', function () {
    return view('welcome');
});