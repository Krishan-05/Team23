<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'stock',
        'original_stock',
        'parent_id',
        'rating',
    ];

    public function subProducts()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
