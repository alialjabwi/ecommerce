<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\SoftDeletes;

class CartController extends Controller
{

    // use SoftDeletes;


    public function index()
    {
        $carts = cart::paginate(10);
        $totalItems = $carts->count();
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
    
        return view('cart-pharmacy', compact('carts', 'totalPrice', 'totalItems'));
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to the cart.');
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); 

        $Cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($Cart) {
            $Cart->quantity += $quantity;
            $Cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cart->delete();

        return response()->json(['success' => 'Product removed from cart successfully.']);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
    
        if ($request->input('quantity') > $cart->product->quantity) {
            return redirect()->route('cart.index')->with('error', 'Quantity exceeds available stock!');
        }
    
        $cart->quantity = $request->input('quantity');
        $cart->save();
    
        return redirect()->route('cart.index')->with('success', 'Quantity updated successfully!');
    }
    




}
