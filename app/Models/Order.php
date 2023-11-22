<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_id',
        'first_name',
        'last_name',
        'address',
        'payment_id',
        'payment_status',
        'payment_date',
        'tracking_no',
        'delivery_date',
        'status',
        'total_price',
        'final_price',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
        'delivery_date' => 'datetime',
        'total_price' => 'decimal:2',
        'final_price' => 'decimal:2',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
