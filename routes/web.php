<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\destroyProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserOrderHistory;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\addProductController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\DestroyProductController;
use App\Http\Controllers\UserOrderHistoryController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/loginProcess', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('/loginProcess', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});
Route::get('/login', function () {
    return redirect()->route('login'); // Redirect ke halaman login
});

Route::get('/Home', [ProductController::class, 'showProducts'])->middleware('auth')->name('home');
Route::get('/foods', [ProductController::class, 'showFoods'])->middleware('auth')->name('foodsName');
Route::get('/drinks', [ProductController::class, 'showDrinks'])->middleware('auth')->name('drinks');

Route::get('/about', function () {
    return view('AboutUs');
});

Route::get('/apps', function () {
    return view('apps');
});

Route::get('/editUserView{id}', [EditUserController::class, 'editUserView'])->name('editUserView')->middleware('auth');

Route::get('/userOrderHistory/{id}', [UserOrderHistoryController::class, 'userOrderHistoryView'])->name('userOrderHistoryView');

Route::get('/registration', [UserRegistration::class, 'registrationPage'])->name('registrationPage');


/*
****** Router Admin ******
*/

// Route::get('/Admin', function () {
//     return view('Admin.adminHome');
// })->middleware('auth');

// Route::get('/logOut', function () {
//     return view('Admin.logOut');
// });

// Route::get('/addProduct', function () {
//     return view('Admin.addProduct'); // Pastikan view ada di resources/views/Admin/addProduct.blade.php
// })->name('addProduct');

// Route::get('/editProduct/{id}', [UpdateProductController::class, 'editView'])->name('editProduct')->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {
    // Route::get('/', function () {
    //     return view('Admin.adminHome');
    // })->name('adminHome');
    Route::get('/', [AdminDashboardController::class, 'DashboardView'])->name('adminHome');

    Route::get('/addProduct', function () {
        return view('Admin.addProduct');
    })->name('addProduct');
    Route::get('/editProduct/{id}', [UpdateProductController::class, 'editView'])->name('editProduct');

    Route::post('/saveProduct', [addProductController::class, 'saveProduct'])->name('saveProduct');
    Route::put('/saveEditProduct/{id}', [UpdateProductController::class, 'UpdateProduct'])->name('saveEditProduct');
    Route::get('/products/hapus/{id}', [DestroyProductController::class, 'destroy'])->name('hapusproduk');
    Route::get('/productManagement', [ProductController::class, 'productView'])
        ->name('productManagement'); // <--- Sesuaikan name() dengan yang ada di route:list
});

/*
Rooute aksi (CRUD)
 */
// create/add
Route::post('/saveRegistration', [UserRegistration::class, 'saveRegistration'])->name('saveRegistration');
// update/edit
Route::put('/saveUserSetting{id}', [EditUserController::class, 'saveUserSetting'])->name('SaveUserSetting');
// read
// delete

// logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Redirect ke halaman utama setelah logout
})->name('logout');
