<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }


    public function userPermissions()
    {
        $users = User::select('id', 'email', 'useraccess')->get(); 
        return view('admin.user-permissions', compact('users'));
    }
    

    public function updateUserAccess(Request $request, $id)
    {
        $user = User::findOrFail($id); 
        $user->useraccess = $request->input('useraccess'); 
        $user->save(); 
    
        return back()->with('success', 'User access updated successfully!');
    }


    public function stockview()
    {
        $products = Product::select('id', 'name', 'price', 'stock')->get();
        return view('admin.stockview', compact('products'));
    }
}
