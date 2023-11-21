<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'actual_price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'actual_price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
