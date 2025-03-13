<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClothingController extends Controller
{
    public function index()
    {
        return view('clothing');
    }
}
