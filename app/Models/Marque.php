<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable =
        ["brand"];

    public function montres()
    {
        return $this->hasMany(Montre::class);
    }
}
