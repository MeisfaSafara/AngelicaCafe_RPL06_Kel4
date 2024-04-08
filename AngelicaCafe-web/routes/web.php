<?php

use App\Http\Controllers\AboutusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminAboutUsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('/auth/login');
<<<<<<< HEAD
=======
});
Route::get('/forgot', function () {
    return view('/auth/forgotPassword');
});
Route::get('/signup', function () {
    return view('/auth/signup');
});

Route::get('/about', function () {
    return view('about');
>>>>>>> cc624847249d775e46518be063115b9a790ae325
});
Route::get('/forgot', function () {
    return view('/auth/forgotPassword');
});
Route::get('/signup', function () {
    return view('/auth/signup');
});

Route::get('/about',[AboutusController::class, 'index'])->name('aboutus');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});
// Route::get('/admin/aboutUs', function () {
//     return view('admin.aboutUs.edit');
// });

Route::get('/profile', function () {
    return view('profile.profile');
});

Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/signup',[AuthController::class, 'register'])->name('register');
Route::get('/cekUser',[AuthController::class, 'cekUser'])->name('cekuser');

Route::get('orders',[OrderController::class,'index'])->name('admin.orders.indes');

Route::get('/review',[ReviewController::class,'index']);
Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');

Route::prefix('admin')->group(function () {
    Route::get('/aboutUs/edit', [AdminAboutUsController::class, 'edit'])->name('admin.aboutUs.edit');
    Route::post('/aboutUs/update', [AdminAboutUsController::class, 'update'])->name('admin.aboutUs.update');
});





