<?php

namespace App\Http\Controllers;

use App\Models\Montre;
use App\Http\Requests\StoreMontreRequest;
use App\Http\Requests\UpdateMontreRequest;

class MontreController extends Controller
{
    public static function promotions(int $limit)
    {
        return Montre::where("reduction","!=","null")
            ->orderBy('reduction',"desc")
            ->limit($limit)
            ->get();
    }
}
