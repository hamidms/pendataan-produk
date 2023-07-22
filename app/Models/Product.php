<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
