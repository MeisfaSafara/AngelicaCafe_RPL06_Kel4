<?php

use App\Http\Controllers\AboutusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminAboutUsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController; 
use App\Http\Controllers\ProdukController; 
use App\Http\Controllers\MenuController; 


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
});
Route::get('/forgot', function () {
    return view('/auth/forgotPassword');
});
Route::get('/signup', function () {
    return view('/auth/signup');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/forgot', function () {
    return view('/auth/forgotPassword');
});
Route::get('/signup', function () {
    return view('/auth/signup');
});
// controll database about us
Route::get('/about',[AboutusController::class, 'index'])->name('aboutus');

// controll database menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
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

Route::get('/profile', [UserController::class, 'profile'])->name('profile.user');
Route::put('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
Route::get('/profile/address', [UserController::class,'showAddress'])->name('address.index');
Route::get('/profile/address/edit/{id}', [UserController::class,'editAddress'])->name('address.edit');
Route::put('/profile/address/edit/{id}', [UserController::class,'updateAddress'])->name('address.update');
Route::get('/profile/address/add', [UserController::class,'addAddress'])->name('address.add');
Route::post('/profile/address/add', [UserController::class,'storeAddress'])->name('storeAddress');
Route::put('/profile/update-profile-picture', [UserController::class, 'updateProfilePicture'])->name('profile.update-profile-picture');
Route::get('/review',[ReviewController::class,'index']);
Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');

Route::prefix('admin')->group(function () {
    // route about us
    Route::get('/aboutUs/edit', [AdminAboutUsController::class, 'edit'])->name('admin.aboutUs.edit');
    Route::post('/aboutUs/update', [AdminAboutUsController::class, 'update'])->name('admin.aboutUs.update');
    // route order admin
    Route::get('orders',[OrderController::class,'index'])->name('admin.orders.indes');
    Route::get('orders/detail/{id}',[OrderController::class,'detailOrder'])->name('admin.orders.detail');
    Route::put('orders/status/update/{id}',[OrderController::class,'updateStatusOrder'])->name('admin.orders.update.status');
    //route order produks
    Route::get('produks', [ProdukController::class, 'index']);
    Route::get('produks/create', [ProdukController::class, 'create'])->name('admin.produks.create');;
    Route::post('produks/store', [ProdukController::class, 'store'])->name('admin.produks.store');
    Route::get('produks/update/{id}', [ProdukController::class, 'edit']);
    Route::put('produks/update/{id}', [ProdukController::class, 'update'])->name('admin.produks.update');
    Route::delete('produks/delete/{id}',[ProdukController::class, 'delete'])->name('admin.produks.delete');
});

Route::get('/about', [AboutusController::class, 'index'])->name('aboutus');
Route::get('/admin/review', [ReviewController::class, 'adminReview']); 
