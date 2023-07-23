<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'desc',
        'type',
        'stock',
        'buy_price',
        'sell_price',
        'photo',
    ];

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts')->withPivot('quantity');
    }
}
