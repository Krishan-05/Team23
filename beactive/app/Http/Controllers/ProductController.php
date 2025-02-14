<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show()
    {
        $mainProducts = Product::whereNull('parent_id')->get();
        return view('product-page', compact('mainProducts'));
    }

    public function showSupplements()
    {
        $parentId = 1;  
        $mainProducts = Product::where('parent_id', $parentId)->get();
        
        return view('supplements', compact('mainProducts'));
    }

    public function showSports()
    {
        $parentId = 2;  
        $mainProducts = Product::where('parent_id', $parentId)->get();
        
        return view('sports', compact('mainProducts'));
    }

    public function showGym()
    {
        $parentId = 3;  
        $mainProducts = Product::where('parent_id', $parentId)->get();
        
        return view('gym', compact('mainProducts'));
    }

    public function showClothing()
    {
        $parentId = 4;  
        $mainProducts = Product::where('parent_id', $parentId)->get();
        
        return view('clothing', compact('mainProducts'));
    }

    public function showAccessories()
    {
        $parentId = 5;  
        $mainProducts = Product::where('parent_id', $parentId)->get();
        
        return view('accessories', compact('mainProducts'));
    }

}