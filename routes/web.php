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
use App\Http\Controllers\Controller;
use App\Http\Controllers\DestroyProductController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\UserRegistration;

// Arahkan route '/' ke halaman login
// Route untuk menampilkan halaman login form
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

/*
    - Route ini menangani URL '/' (root URL) yang akan memanggil metode `showLoginForm` dari `AuthController`.
    - Fungsi dari `showLoginForm` adalah untuk menampilkan halaman login bagi pengguna yang belum terautentikasi.
    - Dengan nama route `login`, ini mempermudah untuk memanggil URL login di seluruh aplikasi, seperti pada form action atau link.
*/

// Route untuk memproses login form (POST request)
Route::post('/loginProcess', [AuthController::class, 'processLogin'])->name('login.process');
// jika user sengaja mengakses URL '/loginProcess' tanpa melalui form login maka di arahkan ke halaman login
Route::get('/loginProcess', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});
// jika user sengaja mengakses URL '/login' maka di arahkan ke halaman login walau aslinya dengan '/' untuk mengakses route ini untuk menghindari user bingung jika ingin mengaksesnya dengan mengetik langsung melalui url
Route::get('/login', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});
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

Route::get('/editUserView{id}', [EditUserController::class, 'editUserView'])->name('editUserView')->middleware('auth');


/*
****** Router Admin ******
*/

Route::get('/Admin', function () {
    return view('Admin.adminHome');
});


Route::get('/logOut', function () {
    return view('Admin.logOut');
});

Route::get('/addProduct', function () {
    return view('Admin.addProduct'); // Pastikan view ada di resources/views/Admin/addProduct.blade.php
})->name('addProduct');

Route::get('/userSetting', function () {
    return view('UserSetting');
});

Route::get('/registration', [UserRegistration::class, 'registrationPage'])->name('registrationPage');

Route::get('/editProduct/{id}', [UpdateProductController::class, 'editView'])->name('editProduct')->middleware('auth');


/*
Rooute aksi (CRUD)
 */
// create/add
Route::post('/saveProduct', [addProductController::class, 'saveProduct'])->name('saveProduct')->middleware('auth');
Route::post('/saveRegistration', [UserRegistration::class, 'saveRegistration'])->name('saveRegistration');
// update/edit
Route::put('/saveEditProduct/{id}', [UpdateProductController::class, 'UpdateProduct'])->name('saveEditProduct');

Route::put('/saveUserSetting{id}', [EditUserController::class, 'saveUserSetting'])->name('SaveUserSetting');

// read
Route::get('/productManagement', [ProductController::class, 'productView'])->middleware('auth')->name('Admin.productManagement');

// delete
Route::get('products/hapus/{id}', [DestroyProductController::class, 'destroy'])
    ->name('hapusproduk')
    ->middleware('auth');
