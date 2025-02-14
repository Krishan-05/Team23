<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'postcode' => 'required|string|max:10',
            'billing_address' => 'required|string|max:100',
        ],
        [
            'user_id.exists' => 'The userID you entered does not exist. Please enter a valid UserID',
        ]);
    

        Checkout::create([
            'user_id' => $request->user_id,
            'postcode' => $request->postcode,
            'billing_address' => $request->billing_address,
            'is_default' => false,
        ]);
        return redirect()->route('checkout')->with('success', 'Order created successfully successfully!')->with('clearBasket', true);
    }
    
}
