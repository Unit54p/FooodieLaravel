<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('Home');
});



Route::get('/', [ProductController::class, 'showHome']);  // Halaman utama yang menampilkan produk
