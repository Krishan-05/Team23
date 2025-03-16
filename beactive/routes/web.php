<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SupplementController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\ClothingController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('home');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//User routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

});


// Admin Routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});

Route::get('/basket', [BasketController::class, 'index'])->name('basket');

Route::get('/products', [ProductController::class, 'show'])->name('products');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/supplements', [SupplementController::class, 'index'])->name('supplements');

Route::get('/supplements', [ProductController::class, 'showSupplements'])->name('supplements');

Route::get('/accessories', [AccessoryController::class, 'index'])->name('accessories');

Route::get('/accessories', [ProductController::class, 'showAccessories'])->name('accessories');

Route::get('/sports', [SportController::class, 'index'])->name('sports');

Route::get('/sports', [ProductController::class, 'showSports'])->name('sports');

Route::get('/clothing', [ClothingController::class, 'index'])->name('clothing');

Route::get('/clothing', [ProductController::class, 'showClothing'])->name('clothing');

Route::get('/gym', [GymController::class, 'index'])->name('gym');

Route::get('/gym', [ProductController::class, 'showGym'])->name('gym');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/products/{id}', [ProductController::class, 'showProduct'])->name('product.show');

Route::post('/reviews', action: [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/product/{id}/reviews', [ReviewController::class, 'showReviews'])->name('reviews.index');

Route::get('/product/{id}/review', [ReviewController::class, 'showReviewForm'])->name('reviews.add');

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('reviews.submit');

