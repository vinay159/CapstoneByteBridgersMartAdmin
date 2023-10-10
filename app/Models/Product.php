<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const CURRENCY_LIST = [
        'USD' => '&#36;',
        'CAD' => '&#36;',
        'GBP' => '&#163;',
        'EUR' => '&#8364;',
    ];

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

    protected function currencyLogo(): Attribute
    {
        return Attribute::make(
            get: fn () => self::CURRENCY_LIST[$this->currency],
        );
    }
}
