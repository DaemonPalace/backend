<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'ccn',
        'exp',
        'cvv',
        'total'
    ];

    // Hide sensitive data from JSON/array output
    protected $hidden = [
        'ccn',
        'exp',
        'cvv'
    ];
    public function products()
    {
        
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity');
    }
}
