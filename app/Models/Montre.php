<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montre extends Model
{
    use HasFactory;

    protected $fillable =
        ["serial_number", "marque_id", "color", "quantite", "prix", "description", "reduction"];

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
