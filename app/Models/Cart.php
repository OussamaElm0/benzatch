<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =
        ["montre_id", "quantite", "commande_id"];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function montre()
    {
        return $this->belongsTo(Montre::class);
    }
}
