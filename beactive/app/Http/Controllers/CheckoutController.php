<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;

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
            'shipping_address_line_1' => 'required|string|max:255',
            'shipping_town_city' => 'required|string|max:255',
            'shipping_postcode' => 'required|string|max:10',
            'shipping_option' => 'required|in:standard,express',
            'discounted_total_price' => 'required|numeric',
        ]);

        $basket = json_decode($request->input('basket'), true);

        if (empty($basket)) {
            return redirect()->route('checkout')->withErrors('Your basket is empty!');
        }

        $totalPrice = $request->discounted_total_price;

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $request->user_id,
                'status' => 'pending',
                'total_price' => $totalPrice,
            ]);

            Shipping::create([
                'order_id' => $order->id,
                'shipping_address_line_1' => $request->shipping_address_line_1,
                'shipping_address_line_2' => $request->shipping_address_line_2 ?? null,
                'shipping_county' => $request->shipping_county ?? null,
                'shipping_town_city' => $request->shipping_town_city,
                'shipping_postcode' => $request->shipping_postcode,
                'shipping_option' => $request->shipping_option,
            ]);

            foreach ($basket as $item) {
                $product = Product::find($item['id']);

                if (!$product || $product->stock < $item['quantity']) {
                    DB::rollBack();
                    return redirect()->route('checkout')->withErrors("Not enough stock for {$product->name} transaction terminated");
                }

                $product->stock -= $item['quantity'];
                $product->save();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);
            }

            DB::commit();
            session()->flash('clearBasket', true);
            $request->session()->reflash();

            return redirect()->route('checkout')->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error during order creation: " . $e->getMessage());
            return redirect()->route('checkout')->withErrors('There was an error processing your order.');
        }
    }
}
