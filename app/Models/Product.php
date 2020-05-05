<?php

namespace App\Models;

use App\Models\Traits\ModelHavePhoto;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ModelHavePhoto;
    //
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'photo',
        'brand_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,'product_order')->withPivot('quantity');
    }

//    -------------------//trait//----------------

    protected function photos(): array
    {
        return [
          'photo'
        ];
    }
//    ------------------------------------------
}
