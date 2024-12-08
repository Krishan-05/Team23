<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Checkout');
});

// route for the form submission

use App\Http\Controllers\CheckoutController;

Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

