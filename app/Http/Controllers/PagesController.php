<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Montre;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // Initialiser un tableau vide pour stocker le nombre de chaque montre
        $montreCounts = [];

        // Récupérer toutes les commandes
        $commandes = Commande::all();

        // Parcourir chaque commande pour extraire et compter les montres
        foreach ($commandes as $commande) {
            $items = json_decode($commande->items, true);

            foreach ($items as $item) {
                $montreId = $item['id'];
                $quantity = $item['quantity'] ?? 1;

                // Incrémenter le nombre pour cette montre
                if (isset($montreCounts[$montreId])) {
                    $montreCounts[$montreId] += $quantity;
                } else {
                    $montreCounts[$montreId] = $quantity;
                }
            }
        }

        // Trier les montres par nombre de ventes décroissant
        arsort($montreCounts);

        // Récupérer les 10 meilleures montres (ajuster ce nombre si nécessaire)
        $bestSellingMontres = [];

        foreach (array_slice($montreCounts, 0, 5, true) as $montreId => $count) {
            $montre = Montre::find($montreId); // Récupérer la montre avec toutes ses informations
            if ($montre) {
                $montre->sold_quantity = $count; // Ajouter la quantité vendue dans l'objet Montre
                $bestSellingMontres[] = $montre;
            }
        }

        return view("welcome", [
            'marques' => MarqueController::getAllBrands(),
            'promotions' => MontreController::promotions(3),
            'best_sellers' => $bestSellingMontres
        ]);
    }
}
