<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $lowStockCount = Product::whereColumn('stock', '<=', DB::raw('original_stock * 0.25'))->count();
        
        return view('admin.dashboard', compact('lowStockCount'));
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
        $products = Product::all();

        foreach ($products as $product) {
            $product->is_low_stock = $product->stock <= ($product->original_stock * 0.25);
        }

        return view('admin.stockview', compact('products'));
    }

    public function orderview()
    {
        $orders = Order::with(['user', 'orderItems.product'])->orderBy('id', 'asc')->get();
    
        return view('admin.orderview', compact('orders'));
    }

    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->price = $request->price;
        $product->save();

        return redirect()->back()->with('success', 'Price updated successfully.');
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,packaged,dispatched,delivered',
        ]);

        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orderview')->with('success', 'Order status updated successfully.');
    }

    public function showRequestStockForm($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.requeststock', compact('product'));
    }

    public function handleStockRequest(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('admin.stockview')->with('success', 'Stock updated successfully!');
    }

    public function handleReverseStockRequest(Request $request, $id)
    {
        $request->validate([
            'reverse_quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $product->stock -= $request->reverse_quantity;
        if ($product->stock < 0) {
            $product->stock = 0;
        }

        $product->save();

        return redirect()->route('admin.stockview')->with('success', 'Damaged stock reversed successfully!');
    }
}
