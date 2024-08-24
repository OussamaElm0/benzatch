<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Montre;
use Illuminate\Http\Request;

class MontreController extends Controller
{
    public static function promotions(int $limit)
    {
        return Montre::where("reduction","!=","null")
            ->orderBy('reduction',"desc")
            ->limit($limit)
            ->get();
    }

    public function index(Request $request, string $category = "Tous les montres")
    {
        $sortBy = $request->query("sortBy");

        switch ($sortBy) {
            case "asc" :
                $montres = Montre::with("marque")
                    ->where('quantite',">",0)
                    ->orderBy("prix","asc")
                    ->paginate(9);
                break;
            case "desc" :
                $montres = Montre::with("marque")
                    ->where('quantite',">",0)
                    ->orderBy("prix","desc")
                    ->paginate(9);
                break;
            default :
                $montres = Montre::with("marque")
                    ->where('quantite',">",0)
                    ->latest()
                    ->paginate(9);
                break;
        }

        return view(
            "montres.index",
            compact("montres","category")
        );
    }

    public function parCollection(Request $request, string $collection)
    {
        $sortBy = $request->query("sortBy");
        $montres = Montre::with('marque')
            ->where('quantite',">",0);

        if ($collection === "hommes") {
            $montres = $montres->whereNot("gender", "F");
        } elseif ($collection === "femmes") {
            $montres = $montres->whereNot("gender", "H");
        }

        switch ($sortBy) {
            case "asc":
                $montres = $montres->orderBy("prix", "asc");
                break;
            case "desc":
                $montres = $montres->orderBy("prix", "desc");
                break;
            default:
                $montres = $montres->latest();
                break;
        }

        $montres = $montres->paginate(9);

        return view('montres.index', [
            "montres" => $montres,
            "category" => $collection,
        ]);
    }

}
