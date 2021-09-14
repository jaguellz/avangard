<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'partner_name',
        'client_email',
        'status',
        'delivery_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('count');
    }

    public function price()
    {
        $price = 0;
        foreach ($this->products as $product)
        {
            $price = $price + $product->price * $product->pivot->count;
        }
        return $price;
    }
}
