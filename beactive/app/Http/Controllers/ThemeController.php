<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function saveTheme(Request $request)
    {
        // Handle saving theme preference
        $theme = $request->input('theme');
        
        // Example: Store in session 
        session(['theme' => $theme]);
    
        return response()->json(['success' => true]);
    }
    
}
