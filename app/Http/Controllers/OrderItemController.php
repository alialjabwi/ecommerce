<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with('order', 'product')->get();
        return view('order-items.index', compact('orderItems'));
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->back()->with('success', 'Order item deleted successfully.');
    }
}

