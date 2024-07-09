<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [BarangController::class, 'index']);