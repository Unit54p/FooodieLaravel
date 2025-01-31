<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('Home');
// });

// Route::get('/', [ProductController::class, 'showHome']);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\destroyProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\addProductController;
use App\Http\Controllers\DestroyProductController;

// Arahkan route '/' ke halaman login
// Route untuk menampilkan halaman login form
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

/*
    - Route ini menangani URL '/' (root URL) yang akan memanggil metode `showLoginForm` dari `AuthController`.
    - Fungsi dari `showLoginForm` adalah untuk menampilkan halaman login bagi pengguna yang belum terautentikasi.
    - Dengan nama route `login`, ini mempermudah untuk memanggil URL login di seluruh aplikasi, seperti pada form action atau link.
*/

// Route untuk memproses login form (POST request)
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

/*
    - Route ini menangani request POST ke URL '/login' yang dikirimkan dari form login.
    - `processLogin` di dalam `AuthController` bertanggung jawab untuk memvalidasi data yang dikirimkan oleh pengguna (email dan password).
    - Setelah validasi, jika data benar, pengguna akan diautentikasi (login) menggunakan `Auth::attempt()`.
    - Jika login berhasil, pengguna akan diarahkan ke halaman yang telah ditentukan (misalnya halaman home atau dashboard).
    - Jika login gagal, pengguna akan menerima pesan error yang menyatakan bahwa email atau password salah.
    - Nama route `login.process` digunakan untuk memudahkan referensi di dalam form, seperti form action yang mengarah ke route ini.
*/

// Route untuk halaman Home setelah login (halaman ini hanya bisa diakses jika sudah login)
Route::get('/Home', [ProductController::class, 'showProducts'])->middleware('auth')->name('home');
Route::get('/foods', [ProductController::class, 'showFoods'])->middleware('auth')->name('foodsName');
Route::get('/drinks', [ProductController::class, 'showDrinks'])->middleware('auth')->name('drinks');
/*
    - Route ini menangani URL '/Home', yang akan memanggil metode `showHome` dari `ProductController`.
    - Metode `showHome` akan menampilkan halaman home dan menampilkan produk atau data terkait dari database.
    - `middleware('auth')` memastikan bahwa hanya pengguna yang sudah terautentikasi yang bisa mengakses halaman ini.
      Jika pengguna belum login, mereka akan diarahkan ke halaman login.
    - Nama route `home` digunakan untuk merujuk ke URL ini dengan lebih mudah, seperti saat membuat link ke halaman home setelah login.
*/

Route::get('/about', function () {
    return view('AboutUs');
});

Route::get('/apps', function () {
    return view('apps');
});

/*
****** Router Admin ******
*/

Route::get('/Admin', function () {
    return view('Admin.adminHome');
});

Route::get('/userManagement', function () {
    return view('Admin.userManagement');
});

Route::get('/logOut', function () {
    return view('Admin.logOut');
});

Route::get('/addProduct', function () {
    return view('Admin.addProduct'); // Pastikan view ada di resources/views/Admin/addProduct.blade.php
})->name('addProduct');

/*
Rooute aksi (CRUD)
 */
// create/add
Route::post('/saveProduct', [addProductController::class, 'saveProduct'])->name('saveProduct')->middleware('auth');
// update/edit

// read
Route::get('/productManagement', [ProductController::class, 'productView'])->middleware('auth')->name('Admin.productManagement');
// delete
Route::get('products/hapus/{id}', [DestroyProductController::class, 'destroy'])
    ->name('hapusproduk')
    ->middleware('auth');
