<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function userOrders()
    {
        $user = Auth::user();
    

        $orders = Order::with(['orderItems.product', 'shipping'])
                       ->where('user_id', $user->id)
                       ->orderBy('id', 'asc')
                       ->get();
    
        return view('user-orderview', compact('orders'));
    }

    public function requestReturn()
    {
        $user = Auth::user();

        $orders = Order::with('orderItems.product')
                       ->where('user_id', $user->id)
                       ->get();
        return view('requestreturn', compact('orders'));
    }

}