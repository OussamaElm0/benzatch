<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Http\Requests\StoreMarqueRequest;
use App\Http\Requests\UpdateMarqueRequest;

class MarqueController extends Controller
{
    public static function getAllBrands()
    {
        return Marque::all()->pluck("brand","id");
    }
}
