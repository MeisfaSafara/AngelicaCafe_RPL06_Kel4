<?php

use App\Http\Controllers\AboutusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminAboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FavouriteController;




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
Route::get('/contact', function () {
    return view('contact');
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

// Rute untuk Resource Controller ReservationController
Route::get('/reservations/step-one', [ReservationController::class, 'stepOne'])->name('reservations.step-one');
Route::post('/reservations/store-step-one', [ReservationController::class, 'storeStepOne'])->name('reservations.store.step-one');
Route::get('/reservations/step-two', [ReservationController::class, 'stepTwo'])->name('reservations.step-two');
Route::post('/reservations/store-step-two', [ReservationController::class, 'storeStepTwo'])->name('reservations.store.step-two');
Route::get('/reservations/finish-step', [ReservationController::class, 'finishStep'])->name('reservations.finish-step');

// controll database about us
Route::get('/about',[AboutusController::class, 'index'])->name('aboutus');

// controll database menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/search-input', [MenuController::class, 'search'])->name('search');
Route::get('/filter', [MenuController::class, 'filter'])->name('produk.filter');
Route::get('/',[MenuController::class, 'menuUser'])->name('menuUser');
Route::get('/menu/{id?}', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}/detail', 'MenuController@showDetail')->name('menu.detail');
Route::get('/cart', function () {
    return view('cart');
});
// fitur Favourite Menu
Route::post('/favourite/{id}', [FavouriteController::class, 'toggleFavourite']);


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
Route::get('/profile/reservation', function () {
    return view('profile.reservation');
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
Route::delete('profile/delete/{id}',[UserController::class, 'deleteAddress'])->name('address.delete');
Route::put('/profile/update-profile-picture', [UserController::class, 'updateProfilePicture'])->name('profile.update-profile-picture');
Route::get('/review',[ReviewController::class,'index']);
Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');

Route::prefix('admin')->group(function () {
    // Route untuk halaman utama admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    // route about us
    Route::get('/aboutUs/edit', [AdminAboutUsController::class, 'edit'])->name('admin.aboutUs.edit');
    Route::post('/aboutUs/update', [AdminAboutUsController::class, 'update'])->name('admin.aboutUs.update');
    // route order admin
    Route::get('orders',[OrderController::class,'index'])->name('admin.orders.indes');
    Route::get('orders/detail/{id}',[OrderController::class,'detailOrder'])->name('admin.orders.detail');
    Route::put('orders/status/update/{id}',[OrderController::class,'updateStatusOrder'])->name('admin.orders.update.status');
    Route::put('orders/status/delivery/{id}',[OrderController::class,'updateStatusDelivery'])->name('admin.orders.update.delivery');
    //route order produks
    Route::get('produks', [ProdukController::class, 'index']);
    Route::get('produks/create', [ProdukController::class, 'create'])->name('admin.produks.create');;
    Route::post('produks/store', [ProdukController::class, 'store'])->name('admin.produks.store');
    Route::get('produks/update/{id}', [ProdukController::class, 'edit']);
    Route::put('produks/update/{id}', [ProdukController::class, 'update'])->name('admin.produks.update');
    Route::delete('produks/delete/{id}',[ProdukController::class, 'delete'])->name('admin.produks.delete');
    //Category
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/update/{id}', [CategoryController::class, 'edit']);
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/delete/{id}',[CategoryController::class, 'delete'])->name('admin.category.delete');
    //Reservation
    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    //Dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('reservations', AdminReservationController::class)->names([
        'index' => 'admin.reservations.index',
        'create' => 'admin.reservations.create',
        'store' => 'admin.reservations.store',
        'show' => 'admin.reservations.show',
        'edit' => 'admin.reservations.edit',
        'update' => 'admin.reservations.update',
        'destroy' => 'admin.reservations.destroy',
    ]);
    Route::put('reservations/status/{id}', [AdminReservationController::class, 'updateStatus'])->name('admin.reservations.updateStatus');
    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/admin/reservations/{id}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{id}', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
});

Route::get('/about', [AboutusController::class, 'index'])->name('aboutus');
Route::get('/admin/review', [ReviewController::class, 'adminReview']);

Route::middleware(['auth'])->group(function () {
    // Rute-rute yang memerlukan autentikasi di sini
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.user');

    Route::put('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/cekot',[CartController::class,'order']);
    Route::post('/checkout/order', [CartController::class, 'order'])->name('checkout.order');
    Route::get('/profile/address', [UserController::class,'showAddress'])->name('address.index');
    Route::get('/profile/address/edit/{id}', [UserController::class,'editAddress'])->name('address.edit');
    Route::put('/profile/address/edit/{id}', [UserController::class,'updateAddress'])->name('address.update');
    Route::get('/profile/address/add', [UserController::class,'addAddress'])->name('address.add');
    Route::post('/profile/address/add', [UserController::class,'storeAddress'])->name('storeAddress');
    Route::put('/profile/update-profile-picture', [UserController::class, 'updateProfilePicture'])->name('profile.update-profile-picture');
    Route::get('/cart/{id}', [CartController::class, 'addItemToCart'])->name('cart.add');
    Route::post('/updatecart',[CartController::class,'updateCart']);
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/profile/transaction',[TransactionController::class,'showOrder'])->name('profile.transaction');
    Route::get('/profile/track-orders/{id}', [UserController::class,'trackOrder'])->name('trackOrder');
    Route::get('/profile/reservation', [AdminReservationController::class, 'showReservations'])->name('profile.reservation');
});
