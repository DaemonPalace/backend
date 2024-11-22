<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'available'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity');
    }
}
