<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        return view('gym');
    }
}
