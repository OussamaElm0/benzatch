<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Montre;
use App\Http\Requests\StoreMontreRequest;
use App\Http\Requests\UpdateMontreRequest;
use Illuminate\Http\Request;

class MontreController extends Controller
{
    public function index(Request $request, string $category = "Tous les montres")
    {
        $sortBy = $request->query("sortBy");

        switch ($sortBy) {
            case "asc" :
                $montres = Montre::with("marque")
                    ->orderBy("prix","asc")
                    ->paginate(9);
                break;
            case "desc" :
                $montres = Montre::with("marque")
                    ->orderBy("prix","desc")
                    ->paginate(9);
                break;
            default :
                $montres = Montre::with("marque")
                    ->latest()
                    ->paginate(9);
                break;
        }

        $marques = Marque::all();
        return view(
            "montres.index",
            compact("montres","category")
        );
    }
    public static function promotions(int $limit)
    {
        return Montre::where("reduction","!=","null")
            ->orderBy('reduction',"desc")
            ->limit($limit)
            ->get();
    }
}
