<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable =
        ["path", "montre_id"];

    public function montre()
    {
        return $this->belongsTo(Montre::class);
    }
}
