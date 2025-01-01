<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index()
    {
        $favorites = Favorite::paginate(10);

        return view('wishlist-pharmacy' , compact('favorites')); 
    }
    
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add favorites.');
        }

        $productId = $request->input('product_id');

        $exists = Favorite::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('info', 'Product is already in your favorites.');
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to favorites.');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to manage favorites.');
        }

        $favorite = Favorite::where('id', $id)->where('user_id', Auth::id())->first();

        if ($favorite) {
            
            $favorite = Favorite::where('id', $id)->where('user_id', Auth::id())->first();

            if ($favorite) {
                $favorite->delete();

                return response()->json(['success' => 'Product removed from favorites successfully.']);
            }

            return response()->json(['error' => 'Product not found in your favorites.'], 404);

        } else {

            $favorite = Favorite::where('product_id', $id)->where('user_id', Auth::id())->first();
            if ($favorite) {
                $favorite->delete();

                return redirect()->back()->with('success', 'Product removed from favorites successfully.');

            }

            return redirect()->back()->with('info', 'Product not found in your favorites.');

        }
    }
}
