<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index()
    {
        return view('accessories');
    }
}
