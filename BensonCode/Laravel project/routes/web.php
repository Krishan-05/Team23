<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/basket', function () {
    return view('basket');
});
Route::get('/products', [ProductController::class, 'show']);
