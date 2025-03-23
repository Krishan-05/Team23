<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total_price']; 

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function shipping() {
        return $this->hasOne(Shipping::class, 'order_id');
    }

    public function hasReturn()
    {
        return $this->returns()->exists();
    }

    public function returns()
    {
        return $this->hasMany(OrderReturn::class, 'order_id');
    }
}