<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::with('user')->where('user_id', Auth::id())->paginate(10);

        return view('order', compact('orders'));
    }

    // public function show(Order $order)
    // {
    //     $order->load('items.product');
    //     return view('orders.show', compact('order'));
    // }


    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'nullable|string',
            'address' => 'required|string',
            'apartment' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postcode' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'status' => 'required|string',
            'total' => 'required|numeric|min:0',
            'order_notes' => 'nullable|string',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => $request->status, 
            'country' => $request->country,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            'email' => $request->email,
            'phone' => $request->phone,
            'total' => $request->total,
            'order_notes' => $request->order_notes,
        ]);
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }


    // public function update(Request $request, Order $order)
    // {
    //     $validated = $request->validate([
    //         'status' => 'required|in:pending,completed,canceled',
    //     ]);

    //     $order->update($validated);

    //     return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    // }

    // public function destroy(Order $order)
    // {
    //     $order->delete();

    //     return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    // }
}

