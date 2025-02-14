<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show()
    {
        // Fetch all main products (those without a parent_id)
        $mainProducts = Product::whereNull('parent_id')->get();

        // Pass the products to the view
        return view('product-page', compact('mainProducts'));
    }
}
