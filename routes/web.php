<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('Home');
// });

// Route::get('/', [ProductController::class, 'showHome']);
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Arahkan route '/' ke halaman login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

// Route untuk halaman Home setelah login (dipindahkan ke route terpisah)
Route::get('/Home', [ProductController::class, 'showHome'])->middleware('auth')->name('home');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
