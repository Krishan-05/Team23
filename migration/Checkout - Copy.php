<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_type',
        'card_number',
        'cvv',
        'expiry_date',
        'postcode',
        'billing_address',
        'is_default',
    ];
}
