<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
      'user_id','payment_type', 'amount', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('quantity');
    }
}
