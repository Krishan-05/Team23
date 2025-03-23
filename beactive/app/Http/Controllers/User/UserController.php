<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log; 

class UserController extends Controller
{
    public function index(){
        return view('dashboard');   
    }

    public function updateNewsletter(Request $request)
    {
        $user = auth()->user();
        
        Log::info('Current User Newsletter Status: ' . $user->newsletter);
    
        if ($user->newsletter === 'yes') {
            Log::info('User is already subscribed'); 
            return response()->json(['message' => 'You are already subscribed to the newsletter!'], 400);
        }
        
        $user->newsletter = 'yes';
        $user->save();
        
        Log::info('User subscribed successfully');
        
        return response()->json(['message' => 'You have successfully subscribed to the newsletter,  view newsletters in dashboard!'], 200);
    }
    
    
}
