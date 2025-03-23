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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AnalyticsController;
use App\Models\GeneralReview;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\OrderReturnController;
use App\Models\Order; 


use App\Http\Controllers\Auth\PasswordController;

Route::get('/forgot-password', [PasswordController::class, 'showEmailForm'])->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'checkEmail'])->name('password.checkEmail');
Route::get('/reset-password/{email}', [PasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password/{email}', [PasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/', function () {
    $reviews = GeneralReview::orderBy('created_at', 'desc')->limit(10)->get();
    return view('home', compact('reviews'));
});

Route::view('/categories', 'categories')->name('categories');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/newsletter', [UserController::class, 'index'])->name('newsletter');
    Route::get('/user-orderview', [OrderController::class, 'userOrders'])->name('user.orders');
    Route::get('/request-return', [OrderController::class, 'requestReturn'])->name('request.return');
    Route::get('/create-return/{orderId}', [OrderReturnController::class, 'create'])->name('create.return');
    Route::post('/confirm-return/{orderId}', [OrderReturnController::class, 'store'])->name('confirm.return');
});

Route::post('/newsletter/update', [UserController::class, 'updateNewsletter'])->name('newsletter.update')->middleware('auth');

Route::get('/newsletter', [NewsletterController::class, 'index'])->middleware('auth')->name('newsletter');

// Admin Routes
Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/user-permissions', [AdminController::class, 'userPermissions'])->name('admin.user-permissions');
    Route::get('/admin/stockview', [AdminController::class, 'stockview'])->name('admin.stockview');
    Route::get('/admin/orderview',[AdminController::class, 'orderview'])->name('admin.orderview');
    Route::put('/admin/user-permissions/{id}', [AdminController::class, 'updateUserAccess'])->name('update-user-access');
    Route::put('/admin/update-order-status/{order}', [AdminController::class, 'updateOrderStatus'])->name('update-order-status');
    Route::get('/admin/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');
    Route::get('/admin/analytics-data', [AnalyticsController::class, 'fetchData'])->name('admin.analytics-data');
    Route::put('/admin/update-price/{id}', [AdminController::class, 'updatePrice'])->name('admin.updatePrice'); 

    Route::get('/admin/add-newsletter', [NewsletterController::class, 'create'])->name('admin.add-newsletter');
    Route::post('/admin/add-newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

    Route::get('/admin/requeststock/{id}', [AdminController::class, 'showRequestStockForm'])->name('admin.requestStock');
    Route::post('/admin/requeststock/{id}', [AdminController::class, 'handleStockRequest'])->name('admin.handleStockRequest');
    Route::post('/admin/reverse-stock/{id}', [AdminController::class, 'handleReverseStockRequest'])->name('admin.handleReverseStockRequest');

    
});





Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/check-stock', [CheckoutController::class, 'checkStock']);
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

Route::get('/products/{id}', [ProductController::class, 'showProduct'])->name('product.show');

Route::post('/reviews', action: [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/product/{id}/reviews', [ReviewController::class, 'showReviews'])->name('reviews.index');

Route::get('/product/{id}/review', [ReviewController::class, 'showReviewForm'])->name('reviews.add');

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('reviews.submit');

Route::get('/general-reviews', [ReviewController::class, 'generalReviews']);

Route::get('/leave-general-review', [ReviewController::class, 'createGeneralReview'])->name('general.reviews.create');
Route::post('/leave-general-review', [ReviewController::class, 'storeGeneralReview'])->name('general.reviews.store');

Route::get('/faq', [FAQController::class, 'index'])->name('faq');

