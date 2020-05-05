<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
      'payment_type', 'amount', 'status'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('quantity');
    }
}
