<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable =
        ["client_name", "client_contact", "items", "confirme", "total"];

    protected $casts = [
        'items' => 'array',
    ];

    public function getTotalQuantityAttribute()
    {
        $items = json_decode($this->items, true);

        if (is_array($items)) {
            return array_sum(array_column($items, 'quantity'));
        }

        return 0;
    }
}
