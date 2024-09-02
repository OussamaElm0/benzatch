<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Montre;
use Illuminate\Http\Request;
use function PHPUnit\Framework\assertJson;


class CommandeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            "client_name" => "required|string|min:3",
            "client_contact" => "required|min:9"
        ]);

        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->back()->with("error","Votre panier est vide");
        }

        $total = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price'];
        }, $cartItems));

        foreach ($cartItems as $item){
            $montre = Montre::find($item['id']);

            if ($montre->quantite < $item['quantity']){
                $errorMessage = "Desolé!La quantité du produit : " . $montre->description . " est insuffisante";
                return redirect()->back()->with("error", $errorMessage);
            }
            $montre->quantite -= $item['quantity'];
            $montre->save();
        }

        Commande::create([
            ...$validatedData,
            "items" => json_encode($cartItems),
            "total" => $total,
        ]);

        //Clear the cart
        session()->put("cart",[]);

        return redirect()->back()->with("success", "Commande confirmée avec succès !");
    }
}
