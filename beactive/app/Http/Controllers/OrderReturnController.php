<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderReturnController extends Controller
{
    public function create($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);
        return view('create-return', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);


        OrderReturn::create([
            'order_id' => $orderId,
        ]);

        session()->flash('success', 'Return request submitted successfully.');
        return redirect()->route('dashboard');
    }
}