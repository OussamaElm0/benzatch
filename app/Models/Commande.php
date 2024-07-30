<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable =
        ["client_name", "client_name", "confirme", "total"];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
