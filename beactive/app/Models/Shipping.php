<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping'; 


    protected $fillable = [
        'order_id',
        'shipping_address_line_1',
        'shipping_address_line_2',
        'shipping_county',
        'shipping_town_city',
        'shipping_postcode',
        'shipping_option', 
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
