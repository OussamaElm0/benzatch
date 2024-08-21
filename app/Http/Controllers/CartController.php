<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Montre;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            "id" => "required|exists:montres,id"
        ]);

        $montreId = $request->input('id');
        $montre = Montre::find($montreId);

        $cart = session()->get('cart', []);

        if (isset($cart[$montreId])) {
            $cart[$montreId]['quantity']++;
        } else {
            $cart[$montreId] = [
                'id' => $montre->id,
                'brand' => $montre->marque->brand,
                'serial_number' => $montre->serial_number,
                'price' => $montre->prix - ($montre->reduction * 10),
                'image' => $montre->images[0],
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
    }

    public function showItems()
    {
        $cartItems = session()->get('cart');

        return view("cart.show",compact("cartItems"));
    }
}
