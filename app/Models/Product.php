<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'product_name',
        'product_description',
        'sku',
        'currency',
        'price',
        'image',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
