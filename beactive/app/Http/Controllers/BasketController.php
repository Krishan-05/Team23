<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BasketController extends Controller
{
    public function index()
    {
        return view('basket'); 
    }


    
    
}
