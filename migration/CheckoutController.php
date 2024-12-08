<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout; // Ensure the model is imported

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'card_type' => 'required|string',
            'card_number' => 'required|digits:16',
            'cvv' => 'required|digits:3',
            'expiry_date' => 'required|date_format:Y-m',
            'postcode' => 'required|string',
            'billing_address' => 'required|string',
            'is_default' => 'nullable|boolean',
        ]);

        // Save the data
        Checkout::create($validated);

        // redirects you back
        return redirect()->back()->with('success', 'Checkout information saved');
    }
}
